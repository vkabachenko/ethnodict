<?php
namespace backend\models\traits;

use yii\db\ActiveQuery;

trait OperandSearchTrait
{
    /**
     * @param ActiveQuery $query
     * @param array $columns
     */
    public function operandConditions(ActiveQuery $query, array $columns)
    {
        $tableColumns = $this->tableSchema->columnNames;
        foreach ($columns as $column) {
            $operator = $this->getSearchOperator($this->$column);
            $operand = $this->getSearchOperand($this->$column, $operator);

            if ($operator !== '=' || $operand !== '' ) {
                if (in_array($column, $tableColumns)) {
                   $query->andWhere([$operator, $this->tableName().'.'.$column, $operand]);
                } else {
                   $query->andHaving([$operator, $column, $operand]);
                }
            }
        }
    }

    /**
     * @param $field string
     * @return string
     */
    private function getSearchOperator($field)
    {
        $operators = ['=', '>=', '<=', '<>','>', '<'];
        foreach ($operators as $operator) {
            if (strpos($field, $operator)===0) {
                return $operator;
            }
        }
        return '=';
    }

    /**
     * @param $field string
     * @param $operator string
     * @return string
     */

    private function getSearchOperand($field, $operator)
    {
        $delimiters = ' \'"';
        $operand = str_replace($operator,'',$field);
        $operand = trim($operand, $delimiters);

        return $operand;
    }

}