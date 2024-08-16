<?php
function changeFirstCharacterColor($text, $color = 'red')
{
    $words = explode(' ', $text);
    $coloredText = "";
    foreach ($words as $word) {
        $firstChar = substr($word, 0, 1);
        $restOfWord = substr($word, 1);

        $coloredWord = "<span style='color: $color;'>$firstChar</span>$restOfWord";
        $coloredText .= $coloredWord . " ";
    }

    return $coloredText;
}

echo changeFirstCharacterColor("Aptech VietNam");