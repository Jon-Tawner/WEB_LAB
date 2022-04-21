<?php

namespace app\validators;

class ResultsVerification extends FormValidation {
    public $Answer = [];
    public $countAsk = 0;
    public $countCorrect = 0;

    public function SetAnswer($key, $value) {
        $this->Answer[$key] = $value;
        $this->countAsk++;
    }

    public function CheckAnswer($post) {
        foreach ($this->Answer as $key => $value) {
            if ($this->Answer[$key] == $post[$key]) {
                $this->countCorrect++;
            }
        }
        return $this->countCorrect . '/' . $this->countAsk;
    }
}
