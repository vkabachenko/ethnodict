<?php
/**
 * Created by PhpStorm.
 * User: vvk
 * Date: 11.03.16
 * Time: 19:32
 */

namespace tests\codeception\common\_support;

use yii\console\Controller;
use common\models\Word;
use common\models\WordAccent;
use common\models\WordVariant;
use Faker;


class FakeDbController extends Controller
{
    public $countWords = 10;
    public $countAccents = 1;
    public $countVariants = 1;
    public $countTypes = 5;

    public function actionMake()
    {
        Word::deleteAll();

        $faker = Faker\Factory::create();

        for ($i = 0; $i < $this->countWords; $i++) {
            $title = $faker->text(40);
            $word = new Word([
                'title' => $title,
            ]);
            $word->save();
        }

        $words = Word::find()->all();

        foreach ($words as $word) {
            $used = [];
            for ($i = 0; $i < $this->countAccents; $i++) {
                $accent_position = $faker->numberBetween(0, mb_strlen($word->title,'utf-8')-1);
                if (!in_array($accent_position, $used )) {
                    $used[] = $accent_position;
                    $wordAccent = new WordAccent([
                            'id_word' => $word->id,
                            'accent_position' => $accent_position
                        ]);
                    $wordAccent->save();
                }
            }
        }

        foreach ($words as $word) {
            $used = [];
            for ($i = 0; $i < $this->countVariants; $i++) {
                $id_variant = $faker->numberBetween(0, count($words)-1);
                if (!in_array($id_variant, $used )) {
                    $used[] = $id_variant;
                    $wordVariant = new WordVariant([
                        'id_word' => $word->id,
                        'id_variant' => $words[$id_variant]->id,
                        'id_type' => $faker->numberBetween(1, $this->countTypes),
                        'comment' => $faker->text(80)
                    ]);
                    $wordVariant->save();
                }
            }
        }


    }


} 