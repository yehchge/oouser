<?php

/**
 * @desc 樂隊(Band)介面
 */
interface Band {
    public function getName();

    // Genre 類型
    public function getGenre();

    // Musician 音樂家
    public function addMusician(Musician $musician);
    public function getMusicians();
}
