<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use App\Core\Upload;

/**
 * VillagePhotos Model
 *
 * @method \App\Model\Entity\VillagePhoto get($primaryKey, $options = [])
 * @method \App\Model\Entity\VillagePhoto newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\VillagePhoto[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\VillagePhoto|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VillagePhoto|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VillagePhoto patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\VillagePhoto[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\VillagePhoto findOrCreate($search, callable $callback = null, $options = [])
 */
class VillagePhotosTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('village_photos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
        $this->belongsTo('Villages',[
            'className'=>'Villages'
        ])
        ->setForeignKey('village_code');

        $this->addBehavior('Josegonzalez/Upload.Upload', [
            'photo' => [
                'fields' => [
                    // if these fields or their defaults exist
                    // the values will be set.
                    'dir' => 'photo_dir', // defaults to `dir`
                    'size' => 'photo_size', // defaults to `size`
                    'type' => 'photo_type', // defaults to `type`
                ],
                'pathProcessor' => 'App\Core\Upload\PathProcessor',
                'path'=>'webroot{DS}img{DS}{model}{DS}{field}{DS}',
                'nameCallback'=>function(array $data, array $settings,  $entity) {
                   // dump($entity);
                    $ext = pathinfo($data['name'], PATHINFO_EXTENSION);
                    $filename = pathinfo($data['name'], PATHINFO_FILENAME );
                    return $entity->village_code.'-'.uniqid().'.'.$ext;
                },
                'keepFilesOnDelete'=>false
            ],
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            
            ->maxLength('photo', 255)
            ->allowEmpty('photo')
            ->add('photo',[
                'mimeType' => [
                    'rule' => array('mimeType', array('image/gif', 'image/png', 'image/jpg', 'image/jpeg')),
                    'message' => 'Please only upload images (gif, png, jpg).',
                    'last' => TRUE,
                ],
                'fileSize' => [
                    'rule' => array('fileSize', '<=', '1MB'),
                    'message' => 'Image/Photo must be less than 1MB.',
                    'last' => TRUE,
                ],
            ]);

        $validator
            ->scalar('photo_dir')
            ->maxLength('photo_dir', 255)
            ->allowEmpty('photo_dir');

        $validator
            ->scalar('photo_type')
            ->maxLength('photo_type', 255)
            ->allowEmpty('photo_type');

        $validator
            ->scalar('photo_size')
            ->maxLength('photo_size', 255)
            ->allowEmpty('photo_size');

        $validator
            ->scalar('village_code')
            ->maxLength('village_code', 20)
            ->allowEmpty('village_code');

        return $validator;
    }
}
