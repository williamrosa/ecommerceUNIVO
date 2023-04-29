<?php

namespace app\modules\productos\models;

use app\models\Usuarios;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "tbl_categorias".
 *
 * @property int $id_categoria
 * @property string $nombre
 * @property string|null $descripcion
 * @property string|null $fecha_ing
 * @property int|null $id_usuario_ing
 * @property string|null $fecha_mod
 * @property int|null $id_usuario_mod
 * @property int $estado
 *
 * @property TblProductos[] $tblProductos
 * @property TblSubCategorias[] $tblSubCategorias
 * @property TblUsuarios $usuarioIng
 * @property TblUsuarios $usuarioMod
 */
class Categorias extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_categorias';
    }

    /**
     * {@inheritdoc}
     */

     public function behaviors(){
        return [
            [
                'class' => TimestampBehavior::class,
                'createdAtAttribute' => 'fecha_ing',
                'updatedAtAttribute' => 'fecha_mod',
                'value' => date('Y-m-d H:i:s')
            ],
            [
                'class' => BlameableBehavior::class,
                'createdByAttribute' => 'id_usuario_ing',
                'updatedByAttribute' => 'id_usuario_mod',
            ]
        ];
    }

    public function rules()
    {
        return [
            [['nombre', 'estado'], 'required'],
            [['descripcion'], 'string'],
            [['fecha_ing', 'fecha_mod'], 'safe'],
            [['id_usuario_ing', 'id_usuario_mod', 'estado'], 'integer'],
            [['nombre'], 'string', 'max' => 50],
            [['id_usuario_ing'], 'exist', 'skipOnError' => true, 'targetClass' => Usuarios::class, 'targetAttribute' => ['id_usuario_ing' => 'id_usuario']],
            [['id_usuario_mod'], 'exist', 'skipOnError' => true, 'targetClass' => Usuarios::class, 'targetAttribute' => ['id_usuario_mod' => 'id_usuario']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_categoria' => 'Id',
            'nombre' => 'Nombre',
            'descripcion' => 'Descripción',
            'fecha_ing' => 'Fecha Ingreso',
            'id_usuario_ing' => 'Id Usuario Ing',
            'fecha_mod' => 'Fecha Modificaión',
            'id_usuario_mod' => 'Id Usuario Mod',
            'estado' => 'Estado',
        ];
    }

    /**
     * Gets query for [[TblProductos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductos()
    {
        return $this->hasMany(TblProductos::class, ['id_categoria' => 'id_categoria']);
    }

    /**
     * Gets query for [[TblSubCategorias]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSubCategorias()
    {
        return $this->hasMany(SubCategorias::class, ['id_categoria' => 'id_categoria']);
    }

    /**
     * Gets query for [[UsuarioIng]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarioIng()
    {
        return $this->hasOne(Usuarios::class, ['id_usuario' => 'id_usuario_ing']);
    }

    /**
     * Gets query for [[UsuarioMod]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarioMod()
    {
        return $this->hasOne(Usuarios::class, ['id_usuario' => 'id_usuario_mod']);
    }
}
