<?php

function getGoods()
{
    $sql = "SELECT * FROM goods";
    $goods = getAssocResult($sql);

    return $goods;
}

function getGoodsItem($id)
{
    $id = (int)$id;
    $sql = "SELECT * FROM goods WHERE id = {$id}";
    $goods_item = getAssocResult($sql);

    // В случае если изображения нет, вернем пустое значение.
    $result = [];
    if (isset($goods_item[0]))
        $result = $goods_item[0];

    return $result;
}