<?php

interface IModel
{
    public function delete($ID);
    public function from($LIST);
    public function getAll();
    public function get($ID);
    public function update();
    public function save();
}
