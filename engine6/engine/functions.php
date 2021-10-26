<?php

/*
 * Функция подготовки переменных для передачи их в шаблон.
 */
function prepareVariables($page, $action, $id)
{
// Переменная для ВСЕХ страниц.
//    $params = ['login' => 'admin'];
    $params = [];

// Для каждой страницы готовим массив со своим набором переменных для подстановки их в соотвествующий шаблон.
    switch ($page) {
        case 'index':
            $params['name'] = 'Power To Play';
            break;

        case 'goods':
            $params['goods'] = getGoods();
            break;

        case 'goods_item':
            $params['goods_item'] = getGoodsItem($id);
            break;

        case 'gallery':
            $params['images'] = getImages();
            break;

        case 'gallery_item':
            addLike($id);
            $params['images_item'] = getFullImage($id);
            break;

        case 'news':
            $params['news'] = getNews();
            break;

        case 'newspage':
            $content = getNewsContent($id);
            $params['prevew'] = $content['prevew'];
            $params['full'] = $content['full'];
            break;

        case 'feedback':
            doFeedbackAction($params, $action, $id);
            $params['feedback'] = getAllFeedback();
            break;

        case 'basket':
            $params['basket'] = [];
            break;

    }

    return $params;
}

function render($page, $params = [])
{
    return renderTemplate(LAYOUTS_DIR . 'layout', [
            'content' => renderTemplate($page, $params),
            'menu' => renderTemplate('menu')
        ]
    );
}

function renderTemplate($page, $params = [])
{
    ob_start();

    if (!is_null($params))
        extract($params);

    $fileName = TEMPLATES_DIR . $page . ".php";

    if (file_exists($fileName)) {
        include $fileName;
    } else {
        Die("Такой страницы не существует. 404");
    }

    return ob_get_clean();
}