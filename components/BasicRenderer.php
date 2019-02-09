<?php

namespace components;

class BasicRenderer
{
    public function render($sourceFile)
    {
        /**
         * @TODO: тут можно написать рендерер файлов из темплейтов и т.д. сейчас не в этом суть.
         */
        include DIR . '/../views/header.php';

        $parseData = $this->getDataFromFile($sourceFile);
        $generator = new CodeGenerator();

        $output = $generator->processOutput($parseData);

        echo $output;

        include DIR . '/../views/footer.php';
    }

    /**
     * @param $sourceFile string
     * @return mixed
     * @throws \Exception
     */
    private function getDataFromFile($sourceFile)
    {
        if (file_exists($sourceFile)) {
            $data = file_get_contents($sourceFile);
            return json_decode($data);
        } else {
            throw new \Exception('Where is file? oO');
        }
    }
}
