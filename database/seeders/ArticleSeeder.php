<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use App\Models\Article;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::transaction(function () {
            // Article::insert([
            //     [
            //         'title' => 'Global Education Awards',
            //         'body'  => 'ECCコンピュータ専門学校をはじめ、姉妹校であるECC国際外語専門学校、ECCアーティスト美容専門学校の学生が集結し、「山口学園の“Global Education”を通じて得た考えや自己成長などについて語る・伝える・共有する」をテーマに想いを伝え合うプレゼンテーションコンテストです。',
            //         'created_at' => date('Y-m-d H:i:s')
            //     ],
            //     [
            //         'title' => '地球祭が今年も開催！！',
            //         'body'  => '12月17日に地球祭（学園祭）が行われました。毎年、ECC国際外語専門学校・ECCアーティスト美容専門学校と共に３校合同で開催される年末の一大行事ですが、感染対策のため昨年と今年は各校別々で行っています。',
            //         'created_at' => date('Y-m-d H:i:s')
            //     ],
            //     [
            //         'title' => ' 「ハロウィンDay」でした。',
            //         'body'  => '10/29（金）ECCコンピュータ専門学校では、恒例の「ハロウィン」が行われました。今年も学生会による校舎の飾りつけや仮装で在校生を楽しませてくれました。',
            //         'created_at' => date('Y-m-d H:i:s')

            //     ],
            //     [
            //         'title' => '2年ぶりに「留学生交流会」を開催しました！',
            //         'body'  => 'コロナの影響で中止していた「留学生交流会」を2年ぶりに実施しましたその様子をお伝えします。',
            //         'created_at' => date('Y-m-d H:i:s')
            //     ],
            // ]);
            \App\Models\Article::factory(20)->create();

        });
    }
}
