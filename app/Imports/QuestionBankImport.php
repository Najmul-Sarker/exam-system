<?php

namespace App\Imports;

use App\Models\QuestionBank;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Str;

class QuestionBankImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new QuestionBank([
            'uuid'=> Str::uuid(), 
           'subject_id'     => $row[0],
           'chapter_id'    => $row[1], 
           'question_text'    => $row[2], 
           'option1'    => $row[3], 
           'option2'    => $row[4], 
           'option3'    => $row[5], 
           'option4'    => $row[6], 
           'correcct_answer'    => $row[7], 
           'question_level'    => $row[8], 
           'marks'    => $row[9], 
           'type'    => $row[10], 
           'status'    => $row[11], 
        ]);
    }

}
