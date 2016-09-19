<?php

namespace app\modules\master\models;

use Yii;


/**
 * This is the model class for table "anggota".
 *
 * @property integer $id
 * @property string $kode_anggota
 * @property string $nama_anggota
 * @property string $tempat_lahir
 * @property string $tanggal_lahir
 * @property string $jenis_kelamin
 *
 * @property AlamatAnggota[] $alamatAnggotas
 */
class Anggota extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'anggota';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kode_anggota', 'nama_anggota', 'tempat_lahir', 'tanggal_lahir'], 'required'],
            [['tanggal_lahir'], 'safe'],
            [['jenis_kelamin'], 'string'],
            [['kode_anggota', 'nama_anggota'], 'string', 'max' => 50],
            [['tempat_lahir'], 'string', 'max' => 45],
            [['kode_anggota'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kode_anggota' => 'Kode Anggota',
            'nama_anggota' => 'Nama Anggota',
            'tempat_lahir' => 'Tempat Lahir',
            'tanggal_lahir' => 'Tanggal Lahir',
            'jenis_kelamin' => 'Jenis Kelamin',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlamatAnggotas()
    {
        return $this->hasMany(AlamatAnggota::className(), ['id_anggota' => 'id']);
    }
}
