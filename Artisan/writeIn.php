<?php

const SNAKE_NAME    = '#SNAKE_NAME#';   // 活動名稱 snake case
const B_CAMEL_NAME  = '#B_CAMEL_NAME#'; // 活動名稱 camel case 第一個字母大寫
const S_CAMEL_NAME  = '#S_CAMEL_NAME#'; // 活動名稱 camel case 第一個字母小寫
const B_MODEL_NAME  = '#B_MODEL_NAME#'; // model名稱 第一個字母大寫‘
const S_MODEL_NAME  = '#S_MODEL_NAME#'; // model名稱 第一個字母小寫‘
const SNAKE_MODEL_NAME  = '#SNAKE_MODEL_NAME#'; // model名稱 snake case
const MODELS_PROP   = '#MODELS_PROP#'; // model properties
const SET_MODELS    = '#SET_MODELS#'; // set model in construct
const MODELS        = '#MODELS#'; // models

/********************************** WriteIn Function **********************************/
{
    function writeIn($param)
    {
        global $b_camel_name;
        global $s_camel_name;
        global $snake_name;
        $modelProp = $mds = $setModels = []; // init

        [
            'b_model_name' => $b_model_name,
            's_model_name' => $s_model_name,
            'snake_model_name' => $snake_model_name,
            'from' => $from,
            'to' => $to,
            'models' => $models
        ] = $param;

        // repository
        if (isset($models)) {
            foreach ($models as $key => $model) {
                $s_model_name = lcfirst($model);
                $modelProp[] = '$' . $s_model_name;
                $mds[] = '\\Model\\' . $b_camel_name . '\\' . $model . ' $' . $s_model_name;
                $setModels[] = '$this->' . $s_model_name . ' = $' . $s_model_name . ";";
            }
        }

        $template = strtr(file_get_contents($from), [
            SNAKE_NAME => $snake_name,
            B_CAMEL_NAME => $b_camel_name,
            S_CAMEL_NAME => $s_camel_name,
            B_MODEL_NAME => $b_model_name,
            S_MODEL_NAME => $s_model_name,
            SNAKE_MODEL_NAME => $snake_model_name,
            MODELS       => implode(', ', $mds),
            MODELS_PROP  => implode(', ', $modelProp),
            SET_MODELS   => implode(' ', $setModels),
        ]);

        $newFile = fopen($to, 'w');

        fwrite($newFile, $template);
        fclose($newFile);

        return printCreatedMessage($to);
    }
}
