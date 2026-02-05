<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Bangla8Mcq2025Seeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        // ✅ আপনার সিস্টেম অনুযায়ী এগুলো বদলাতে পারেন
        $classId   = 3;
        $subjectId = 1;   // বাংলা
        $chapterId = null;
        $lessonId  = null; // থাকলে দিন, না থাকলে null

        // ⚠️ আপনার table এ যদি column name আলাদা হয় (e.g. question_title, option_1...)
        // তাহলে নিচের row keys গুলো আপনার column অনুযায়ী ঠিক করে নিন।

        $data = [
            [
                'questions' => '‘বাংলা ভাষা’ কোন ভাষাগোষ্ঠীর অন্তর্গত?',
                'option_a' => 'ইন্দো-ইউরোপীয়',
                'option_b' => 'সেমিটিক',
                'option_c' => 'দ্রাবিড়',
                'option_d' => 'চৈনিক',
                'right_answer' => 'a',
            ],
            [
                'question' => 'বাংলা ভাষার উৎপত্তি হয়েছে কোন ভাষা থেকে?',
                'option_a' => 'সংস্কৃত',
                'option_b' => 'প্রাকৃত',
                'option_c' => 'পালি',
                'option_d' => 'মাগধী',
                'right_answer' => 'b',
            ],
            [
                'question' => '‘অভিধান’ শব্দটির সঠিক অর্থ কী?',
                'option_a' => 'ব্যাকরণ',
                'option_b' => 'শব্দের অর্থের ভাণ্ডার',
                'option_c' => 'সাহিত্য',
                'option_d' => 'রচনা',
                'right_answer' => 'b',
            ],
            [
                'question' => '‘বাক্য’ বলতে কী বোঝায়?',
                'option_a' => 'একক শব্দ',
                'option_b' => 'অর্থপূর্ণ শব্দসমষ্টি',
                'option_c' => 'বর্ণের সমষ্টি',
                'option_d' => 'ধ্বনি',
                'right_answer' => 'b',
            ],
            [
                'question' => 'কোনটি গদ্য সাহিত্য?',
                'option_a' => 'কবিতা',
                'option_b' => 'নাটক',
                'option_c' => 'প্রবন্ধ',
                'option_d' => 'গান',
                'right_answer' => 'c',
            ],
            [
                'question' => 'বাংলা সাহিত্যের প্রাচীন নিদর্শন কোনটি?',
                'option_a' => 'রামায়ণ',
                'option_b' => 'মহাভারত',
                'option_c' => 'চর্যাপদ',
                'option_d' => 'গীতাঞ্জলি',
                'right_answer' => 'c',
            ],
            [
                'question' => 'চর্যাপদ কোন ভাষার প্রাচীন রূপে রচিত?',
                'option_a' => 'শুদ্ধ বাংলা',
                'option_b' => 'প্রাচীন বাংলা',
                'option_c' => 'ফারসি',
                'option_d' => 'আরবি',
                'right_answer' => 'b',
            ],
            [
                'question' => 'উপন্যাস কোন ধরনের সাহিত্য?',
                'option_a' => 'পদ্য',
                'option_b' => 'গদ্য',
                'option_c' => 'ছড়া',
                'option_d' => 'প্রবচন',
                'right_answer' => 'b',
            ],
            [
                'question' => 'রস কয় প্রকার?',
                'option_a' => '৬',
                'option_b' => '৭',
                'option_c' => '৮',
                'option_d' => '৯',
                'right_answer' => 'd',
            ],
            [
                'question' => '‘শান্ত রস’-এর মূল ভাব কী?',
                'option_a' => 'প্রেম',
                'option_b' => 'হাস্য',
                'option_c' => 'বৈরাগ্য',
                'option_d' => 'ভয়',
                'right_answer' => 'c',
            ],
            [
                'question' => 'কবিতা প্রধানত কী প্রকাশ করে?',
                'option_a' => 'কেবল তথ্য',
                'option_b' => 'অনুভূতি',
                'option_c' => 'নিয়ম',
                'option_d' => 'হিসাব',
                'right_answer' => 'b',
            ],
            [
                'question' => 'ছন্দ বলতে কী বোঝায়?',
                'option_a' => 'শব্দের অর্থ',
                'option_b' => 'ধ্বনির নিয়ম/মাত্রার বিন্যাস',
                'option_c' => 'বাক্যের গঠন',
                'option_d' => 'ভাষার ইতিহাস',
                'right_answer' => 'b',
            ],
            [
                'question' => 'কোনটি লোকসাহিত্য?',
                'option_a' => 'উপন্যাস',
                'option_b' => 'প্রবন্ধ',
                'option_c' => 'গবেষণা',
                'option_d' => 'পালাগান',
                'right_answer' => 'd',
            ],
            [
                'question' => 'রূপক কোন অলংকারের অন্তর্ভুক্ত?',
                'option_a' => 'শব্দালংকার',
                'option_b' => 'অর্থালংকার',
                'option_c' => 'ছন্দালংকার',
                'option_d' => 'বাক্যালংকার',
                'right_answer' => 'b',
            ],
            [
                'question' => 'বাংলা ভাষা আন্দোলন সংঘটিত হয় কোন সালে?',
                'option_a' => '১৯৪৭',
                'option_b' => '১৯৫২',
                'option_c' => '১৯৬৯',
                'option_d' => '১৯৭১',
                'right_answer' => 'b',
            ],
            [
                'question' => 'ভাষা আন্দোলনের মূল উদ্দেশ্য কী ছিল?',
                'option_a' => 'শুধু খেলাধুলা',
                'option_b' => 'মাতৃভাষার মর্যাদা প্রতিষ্ঠা',
                'option_c' => 'কর কমানো',
                'option_d' => 'বাণিজ্য বৃদ্ধি',
                'right_answer' => 'b',
            ],
            [
                'question' => 'গল্প সাধারণত কী নিয়ে রচিত হয়?',
                'option_a' => 'বাস্তব বা কল্পিত ঘটনা',
                'option_b' => 'গণিত সূত্র',
                'option_c' => 'ব্যাকরণ নিয়ম',
                'option_d' => 'মানচিত্র',
                'right_answer' => 'a',
            ],
            [
                'question' => 'নাটকে প্রধানত কী থাকে?',
                'option_a' => 'লম্বা বর্ণনা',
                'option_b' => 'সংলাপ',
                'option_c' => 'শুধু তালিকা',
                'option_d' => 'সংখ্যা',
                'right_answer' => 'b',
            ],
            [
                'question' => 'সাহিত্য বলতে কী বোঝায়?',
                'option_a' => 'যেকোনো লেখা',
                'option_b' => 'শিল্পসম্মত লেখা',
                'option_c' => 'শুধু নিয়ম',
                'option_d' => 'কেবল সংবাদ',
                'right_answer' => 'b',
            ],
            [
                'question' => 'প্রবাদ বলতে কী বোঝায়?',
                'option_a' => 'দীর্ঘ গল্প',
                'option_b' => 'ছোট উপদেশমূলক বাক্য',
                'option_c' => 'গণিত প্রশ্ন',
                'option_d' => 'চিঠি',
                'right_answer' => 'b',
            ],
            [
                'question' => 'কোনটি সমার্থক শব্দের উদাহরণ?',
                'option_a' => 'জল – পানি',
                'option_b' => 'জল – আগুন',
                'option_c' => 'দিন – রাত',
                'option_d' => 'আলো – অন্ধকার',
                'right_answer' => 'a',
            ],
            [
                'question' => 'বিপরীতার্থক শব্দ কোনটি?',
                'option_a' => 'সুখ – আনন্দ',
                'option_b' => 'বড় – বিশাল',
                'option_c' => 'দিন – রাত',
                'option_d' => 'জল – পানি',
                'right_answer' => 'c',
            ],
            [
                'question' => 'বাগধারা কী?',
                'option_a' => 'সরল বাক্য',
                'option_b' => 'বিশেষ অর্থবোধক বাক্যাংশ',
                'option_c' => 'ছন্দ',
                'option_d' => 'ছড়া',
                'right_answer' => 'b',
            ],
            [
                'question' => 'রচনা লেখার সময় সবচেয়ে গুরুত্বপূর্ণ কোনটি?',
                'option_a' => 'শুধু হাতের লেখা',
                'option_b' => 'ভাব ও ভাষা',
                'option_c' => 'শুধু দ্রুত লেখা',
                'option_d' => 'শুধু বড় অক্ষর',
                'right_answer' => 'b',
            ],
            [
                'question' => 'সংস্কৃত ভাষা কোন ভাষাগোষ্ঠীর?',
                'option_a' => 'সেমিটিক',
                'option_b' => 'ইন্দো-ইউরোপীয়',
                'option_c' => 'দ্রাবিড়',
                'option_d' => 'চৈনিক',
                'right_answer' => 'b',
            ],
            [
                'question' => 'বাংলা আমাদের কী?',
                'option_a' => 'বিদেশি ভাষা',
                'option_b' => 'রাষ্ট্রভাষা',
                'option_c' => 'শুধু স্থানীয় ভাষা',
                'option_d' => 'গোপন ভাষা',
                'right_answer' => 'b',
            ],
            [
                'question' => 'ছন্দ না থাকলে কবিতাকে কী বলা হয়?',
                'option_a' => 'গদ্য',
                'option_b' => 'মুক্তছন্দ',
                'option_c' => 'নাটক',
                'option_d' => 'প্রবন্ধ',
                'right_answer' => 'b',
            ],
            [
                'question' => 'সাহিত্যের উদ্দেশ্য কী?',
                'option_a' => 'শুধু বিনোদন',
                'option_b' => 'জ্ঞান ও আনন্দ দেওয়া',
                'option_c' => 'শুধু হিসাব রাখা',
                'option_d' => 'শুধু ছবি আঁকা',
                'right_answer' => 'b',
            ],
            [
                'question' => 'নাট্যকার কী লেখেন?',
                'option_a' => 'গল্প',
                'option_b' => 'কবিতা',
                'option_c' => 'নাটক',
                'option_d' => 'প্রবন্ধ',
                'right_answer' => 'c',
            ],
            [
                'question' => 'ভাষা শেখার প্রধান উপায় কোনটি?',
                'option_a' => 'শুধু মুখস্থ',
                'option_b' => 'শোনা ও বলা',
                'option_c' => 'শুধু কপি করা',
                'option_d' => 'শুধু আঁকা',
                'right_answer' => 'b',
            ],
        ];

        // ✅ এখানে আমরা আপনার mcq_questions টেবিলে insert করছি
        $rows = [];
        foreach ($data as $item) {
            $rows[] = array_merge($item, [
                'class_id'   => $classId,
                'subject_id' => $subjectId,
                'chapter_id' => $chapterId,
                'lesson_id'  => $lessonId,

                'type'       => 'model_question',
                'board_name' => 'dhaka',
                'year'       => 2025,
                'insert_by'  => 1,

                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }

        DB::table('mcq_questions')->insert($rows);

        // DB::table('mcq_questions')
        //     ->where('class_id', 8)
        //     ->where('subject_id', 1)
        //     ->where('type', 'model_question')
        //     ->where('year', 2025)
        //     ->delete();
    }
}
