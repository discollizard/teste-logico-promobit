<?php
namespace App;

class ProductStructure
{
    const products = [
        "preto-PP",
        "preto-M",
        "preto-G",
        "preto-GG",
        "preto-GG",
        "branco-PP",
        "branco-G",
        "vermelho-M",
        "azul-XG",
        "azul-XG",
        "azul-XG",
        "azul-P"
    ];

    public function make(): array
    {
        $colorSizeArrayUnformatted = self::products;
        $colorSizeArrayFormatted = [];

        //declaring array length as variable so PHP doesnt evaluate it over again everytime it goes through the loop
        $colorSAULength = count($colorSizeArrayUnformatted);
        $index = 0;

        while($index < $colorSAULength){
            $entryExploded = explode('-', $colorSizeArrayUnformatted[$index]);

            $colorName = $entryExploded[0];

            if(isset($colorSizeArrayFormatted[$colorName])){
                $index++;
                continue;
            }
            $colorSizeArrayFormatted[$colorName] = [];

            while($index < $colorSAULength){

                $entryColorExploded = explode('-', $colorSizeArrayUnformatted[$index]);
                $entryColorName = $entryColorExploded[0];
                
                if($entryColorName != $colorName) break;
                $entryColorSize = $entryColorExploded[1];
               
                if(!isset($colorSizeArrayFormatted[$colorName][$entryColorSize])) 
                    $colorSizeArrayFormatted[$colorName][$entryColorSize] = 1;
                else
                    $colorSizeArrayFormatted[$colorName][$entryColorSize]++;
                
                $index++;
            }
        }
        return $colorSizeArrayFormatted;
    }
}