<?php

namespace app\modules\productos\models;

use Yii;

/**
 * This is the model class for table "tbl_productos".
 *
 * @property int $id_producto
 * @property string $nombre
 * @property string $sku
 * @property string|null $descripcion
 * @property float $precio
 * @property int $id_categoria
 * @property int $id_sub_categoria
 * @property int $id_marca
 * @property string|null $fecha_ing
 * @property int|null $id_usuario_ing
 * @property string|null $fecha_mod
 * @property int|null $id_usuario_mod
 * @property int $estado
 *
 * @property TblCategorias $categoria
 * @property TblMarcas $marca
 * @property TblSubCategorias $subCategoria
 * @property TblProductosImagenes[] $tblProductosImagenes
 * @property TblUsuarios $usuarioIng
 * @property TblUsuarios $usuarioMod
 */
class Productos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_productos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'sku', 'precio', 'id_categoria', 'id_sub_categoria', 'id_marca', 'estado'], 'required'],
            [['descripcion'], 'string'],
            [['precio'], 'number'],
            [['id_categoria', 'id_sub_categoria', 'id_marca', 'id_usuario_ing', 'id_usuario_mod', 'estado'], 'integer'],
            [['fecha_ing', 'fecha_mod'], 'safe'],
            [['nombre', 'sku'], 'string', 'max' => 100],
            [['sku'],'unique'],
            [['id_categoria'], 'exist', 'skipOnError' => true, 'targetClass' => Categorias::class, 'targetAttribute' => ['id_categoria' => 'id_categoria']],
            [['id_sub_categoria'], 'exist', 'skipOnError' => true, 'targetClass' => SubCategorias::class, 'targetAttribute' => ['id_sub_categoria' => 'id_sub_categoria']],
            [['id_marca'], 'exist', 'skipOnError' => true, 'targetClass' => Marcas::class, 'targetAttribute' => ['id_marca' => 'id_marca']],
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
            'id_producto' => 'Id',
            'nombre' => 'Nombre',
            'sku' => 'SKU',
            'descripcion' => 'Descripción',
            'precio' => 'Precio',
            'id_categoria' => 'Id Categoria',
            'id_sub_categoria' => 'Sub Categoria',
            'id_marca' => 'Id Marca',
            'fecha_ing' => 'Fecha Ingreso',
            'id_usuario_ing' => 'Usuario Ing',
            'fecha_mod' => 'Fecha Modificaión',
            'id_usuario_mod' => 'Usuario Mod',
            'estado' => 'Estado',
        ];
    }

    /**
     * Gets query for [[Categoria]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategoria()
    {
        return $this->hasOne(Categorias::class, ['id_categoria' => 'id_categoria']);
    }

    /**
     * Gets query for [[Marca]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMarca()
    {
        return $this->hasOne(Marcas::class, ['id_marca' => 'id_marca']);
    }

    /**
     * Gets query for [[SubCategoria]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSubCategoria()
    {
        return $this->hasOne(SubCategorias::class, ['id_sub_categoria' => 'id_sub_categoria']);
    }

    /**
     * Gets query for [[TblProductosImagenes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblProductosImagenes()
    {
        return $this->hasMany(ProductosImagenes::class, ['id_producto' => 'id_producto']);
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
