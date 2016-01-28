<?php

namespace app\modules\cabinet\controllers;

use common\controllers\AuthController;
use Imagine\Image\Box;
use Imagine\Image\Point;
use Yii;
use app\models\Advert;
use frontend\models\Search\AdvertSearch;
use yii\helpers\BaseFileHelper;
use yii\helpers\Url;
use yii\imagine\Image;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * AdvertController implements the CRUD actions for Advert model.
 */
class AdvertController extends AuthController
{
    public $layout = 'inner';

    public function init()
    {
        Yii::$app->view->registerJsFile('', []);
    }

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Advert models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AdvertSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionFileUploadGeneral()
    {
        if (Yii::$app->request->isPost) {
            $id = Yii::$app->request->post('id');
            $path = Yii::getAlias('@frontend/web/uploads/adverts/' . $id . '/general');
            BaseFileHelper::createDirectory($path);
            $model = Advert::findOne($id);
            $model->scenario = 'step2';

            $file = UploadedFile::getInstance($model, 'general_image');
            $name = 'general.' . $file->extension;
            $file->saveAs($path . DIRECTORY_SEPARATOR . $name);

            $image = $path . DIRECTORY_SEPARATOR . $name;
            $new_name = $path . DIRECTORY_SEPARATOR . $name;

            $model->general_image = $name;
            $model->save();

            $size = getimagesize($image);
            $width = $size[0];
            $height = $size[1];

            Image::frame($image, 0, '666', 0)
                ->crop(new Point(0, 0), new Box($width, $height))
                ->resize(new Box(1000, 644))
                ->save($new_name, ['quality' => 100]);

            sleep(1);

            return true;
        }
    }

    /**
     * Displays a single Advert model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Advert model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Advert();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //return $this->redirect(['view', 'id' => $model->id]);
            return $this->redirect(['step2']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     *
     */
    public function actionStep2()
    {
        $id = Yii::$app->locator->cache->get('id');
        $model = Advert::findOne($id);
        $image = [];

        if ($general_image = $model->general_image) {
            $image[] = '';
        }

        if (Yii::$app->request->isPost) {
            $this->redirect(Url::to(['advert/']));
        }

        $path = Yii::getAlias('@frontend/web/uploads/adverts/' . $model->id);
        $images_add = [];

        /*
        try {

        } catch () {

        }
        */
    }

    /**
     * Updates an existing Advert model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        /*
        foreach ($model as $row) {
            $data[] = $row->title;
        }
        */

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Advert model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Advert model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Advert the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Advert::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
