<?php
namespace app\controllers;
use yii\web\Controller;

class NewsController extends Controller
{
    public function actionIndex() { return "Список новостей (Yii2)"; }
    public function actionView($id) { return "Просмотр новости №" . $id . " (Yii2)"; }
}
