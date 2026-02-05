<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BanglaCqSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        // ✅ আপনার প্রোজেক্ট অনুযায়ী এগুলো পরিবর্তন করতে পারবেন
        $classId   = 1;   // আপনি চাইলে 8 করতে পারেন
        $subjectId = 1;   // বাংলা
        $chapterId = null;
        $lessonId  = null;

        // ✅ বারবার seed দিলে ডুপ্লিকেট এড়াতে আগে পুরোনোটা মুছে দিতে পারেন (ঐচ্ছিক)
        // DB::table('cq_questions')
        //     ->where('class_id', $classId)
        //     ->where('subject_id', $subjectId)
        //     ->where('type', 'model_question')
        //     ->where('year', 2025)
        //     ->delete();

        $data = [
            [
                'proviking' => 'গ্রামের পাঠাগারে নতুন বই এসেছে। কয়েকজন শিক্ষার্থী নিয়ম করে বই পড়ে নিজেদের লেখালেখি ও ভাষা চর্চা করছে।',
                'proviking_img' => null,
                'question_a' => 'উদ্দীপকে শিক্ষার্থীরা কোন ভালো অভ্যাস গড়ে তুলছে?',
                'question_b' => '“ভাষা চর্চা” বলতে কী বোঝায়—সংক্ষেপে লেখো।',
                'question_c' => 'উদ্দীপকের আলোকে পাঠাগারের উপকারিতা ব্যাখ্যা করো।',
                'question_d' => 'তোমার এলাকায় পাঠাগার সংস্কৃতি বাড়াতে কী কী উদ্যোগ নেওয়া যায়—মতামত দাও।',
                'level' => 'easy',
                'type' => 'model_question',
                'board_name' => null,
                'year' => 2025,
            ],
            [
                'proviking' => 'বিদ্যালয়ে বিজ্ঞান মেলা অনুষ্ঠিত হলো। শিক্ষার্থীরা পরিবেশ রক্ষা ও পরিচ্ছন্নতা নিয়ে পোস্টার তৈরি করল।',
                'proviking_img' => null,
                'question_a' => 'উদ্দীপকে কোন আয়োজনের কথা বলা হয়েছে?',
                'question_b' => 'পরিবেশ রক্ষায় শিক্ষার্থীর ভূমিকা কী—দুটি বাক্যে লেখো।',
                'question_c' => 'উদ্দীপকের আলোকে পোস্টার/চিত্রের গুরুত্ব বিশ্লেষণ করো।',
                'question_d' => '“সচেতনতা তৈরিতে সৃজনশীল কাজ সবচেয়ে কার্যকর”—মতামতসহ ব্যাখ্যা করো।',
                'level' => 'medium',
                'type' => 'model_question',
                'board_name' => null,
                'year' => 2025,
            ],
            [
                'proviking' => 'একজন শিক্ষার্থী পরীক্ষার আগে নিয়মিত পড়াশোনা না করে শেষ রাতে বেশি চাপ দেয়। ফলে সে অসুস্থ হয়ে পড়ে।',
                'proviking_img' => null,
                'question_a' => 'উদ্দীপকে শিক্ষার্থীর কোন ভুলটি দেখা যাচ্ছে?',
                'question_b' => 'সময় ব্যবস্থাপনা বলতে কী বোঝায়?',
                'question_c' => 'উদ্দীপকের আলোকে নিয়মিত পড়াশোনার প্রয়োজনীয়তা ব্যাখ্যা করো।',
                'question_d' => 'তোমার পড়াশোনার রুটিন কেমন হওয়া উচিত—উদাহরণসহ মতামত দাও।',
                'level' => 'easy',
                'type' => 'model_question',
                'board_name' => null,
                'year' => 2025,
            ],
            [
                'proviking' => 'বন্যার সময় কিছু স্বেচ্ছাসেবী দল খাবার ও বিশুদ্ধ পানি বিতরণ করছে, মানুষকে নিরাপদ আশ্রয়ে নিতে সাহায্য করছে।',
                'proviking_img' => null,
                'question_a' => 'উদ্দীপকে কোন দুর্যোগের কথা বলা হয়েছে?',
                'question_b' => 'স্বেচ্ছাসেবা বলতে কী বোঝায়?',
                'question_c' => 'উদ্দীপকের আলোকে মানবিক গুণের প্রকাশ ব্যাখ্যা করো।',
                'question_d' => 'দুর্যোগ মোকাবিলায় ব্যক্তি ও সমাজ কী কী প্রস্তুতি নিতে পারে—বিশ্লেষণ করো।',
                'level' => 'hard',
                'type' => 'model_question',
                'board_name' => null,
                'year' => 2025,
            ],
            [
                'proviking' => 'স্কুলের বার্ষিক খেলাধুলায় সবাই শৃঙ্খলা মেনে অংশ নেয়। বিজয়ী-পরাজিত সবাই একে অপরকে অভিনন্দন জানায়।',
                'proviking_img' => null,
                'question_a' => 'উদ্দীপকে কোন অনুষ্ঠানটি বোঝানো হয়েছে?',
                'question_b' => 'শৃঙ্খলা কেন প্রয়োজন—সংক্ষেপে লেখো।',
                'question_c' => 'উদ্দীপকের আলোকে খেলাধুলার শিক্ষামূলক দিক ব্যাখ্যা করো।',
                'question_d' => 'খেলাধুলা কীভাবে চরিত্র গঠন করে—যুক্তিসহ মতামত দাও।',
                'level' => 'medium',
                'type' => 'model_question',
                'board_name' => null,
                'year' => 2025,
            ],

            // ✅ Board প্রশ্ন ধরনে (board_name required ধরলে এখানে board_name দিয়ে দিলাম)
            [
                'proviking' => 'নদীর তীরে একটি গ্রামে মানুষ নদীভাঙনে ঘরবাড়ি হারাচ্ছে; তবু তারা নতুন করে ঘুরে দাঁড়ানোর চেষ্টা করছে।',
                'proviking_img' => null,
                'question_a' => 'উদ্দীপকে কোন সমস্যার কথা বলা হয়েছে?',
                'question_b' => 'নদীভাঙন বলতে কী বোঝায়?',
                'question_c' => 'উদ্দীপকের আলোকে মানুষের মানসিক শক্তি/দৃঢ়তা ব্যাখ্যা করো।',
                'question_d' => '“প্রাকৃতিক দুর্যোগে টিকে থাকার জন্য সচেতনতা জরুরি”—বিশ্লেষণ করো।',
                'level' => 'hard',
                'type' => 'board_question',
                'board_name' => 'Dhaka', // আপনি আপনার মতো করে দিন
                'year' => 2025,
            ],
        ];

        $rows = [];
        foreach ($data as $item) {
            $rows[] = array_merge($item, [
                'class_id'   => $classId,
                'subject_id' => $subjectId,
                'chapter_id' => $chapterId,
                'lesson_id'  => $lessonId,
                'insert_by'  => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }

        DB::table('cq_questions')->insert($rows);
    }
}
