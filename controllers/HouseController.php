<?php

namespace app\controllers;

use Yii;
use app\models\House;
use app\models\HouseSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\web\UploadedFile;

/**
 * HouseController implements the CRUD actions for House model.
 */
class HouseController extends Controller
{
	public $enableCsrfValidation = false;
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
					'houses' => ['post'],
					'detail' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all House models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new HouseSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single House model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new House model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new House();

        if ($model->load(Yii::$app->request->post())) {
			$file = UploadedFile::getInstance($model, 'url');
			if(null != $file && $file->size > 0) {
				$fileName = time().'.'.$file->extension;
				$path = dirname(dirname(__FILE__))."\images\\".$fileName;
				if ($file->saveAs($path)) {
					$model->url = $fileName;
					if($model->save()) {
						return $this->redirect(['view', 'id' => $model->id]);
					} else {
						echo "house save failed!";
					}
				} else {
					echo "file save failed!";
				}    
			} else {
				if($model->save()) {
					return $this->redirect(['view', 'id' => $model->id]);
				} else {
					echo "house save failed!";
				}
			}
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
	
	public function actionHouses(){
		//pageNum, id, pageSize, id降序排列
		$result = array();
		if(isset($_POST['pageSize'])) {
			$pageSize = $_POST['pageSize'];
			
			if(isset($_POST['id'])){
				$id = $_POST['id'];
				$houses = House::find()->where("id <= :id and isAllowed = 1")->params([":id" => $id])->select(['id', 'url', 'name', 'intro', 'phone', 'lat', 'lng'])->limit($pageSize)->all();
			} else {
				$houses = House::find()->where("isAllowed = 1")->select(['id', 'url', 'name', 'intro', 'phone', 'lat', 'lng'])->limit($pageSize)->all();
			}
			if(null != $houses) {
				$result['code'] = 1;
				$result['result'] = $houses;
			} else {
				$result['code'] = 2;
			}
		} else {
			$houses = House::find()->where("isAllowed = 1")->select(['id', 'url', 'name', 'intro', 'phone', 'lat', 'lng'])->limit(10)->all();
			$result['code'] = 0;
			$result['result'] = $houses;
		}
		echo JSON::encode($result);
	}
	
	public function actionDetail() {
		$result = array();
		if(isset($_POST['id'])) {
			$id = 1;
			$houses = House::find()->where("id = :id")->params([":id" => $id])->one();
			if(null != $houses) {
				$result['code'] = 1;
				$result["result"] = $houses;
			} else {
				$result['code'] = 2;
			}
		} else {
			$result['code'] = 0;
		}
		echo JSON::encode($result);
	}

    /**
     * Updates an existing House model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
		$url = $model->url;
        if ($model->load(Yii::$app->request->post())) {
			$file = UploadedFile::getInstance($model, 'url');
			if(null != $file && $file->size > 0) {
				$fileName = time().'.'.$file->extension;
				$path = dirname(dirname(__FILE__))."\images\\".$fileName;
				if ($file->saveAs($path)) {
					$model->url = $fileName;
					if($model->save()) {
						return $this->redirect(['view', 'id' => $model->id]);
					} else {
						echo "house save failed!";
					}
				} else {
					echo "file save failed!";
				}    
			} else {
				$model->url = $url;
				if($model->save()) {
					return $this->redirect(['view', 'id' => $model->id]);
				} else {
					echo "house save failed!";
				}
			}
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing House model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the House model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return House the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = House::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
