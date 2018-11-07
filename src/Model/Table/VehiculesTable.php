<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Vehicules Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\SubcategoriesTable|\Cake\ORM\Association\BelongsTo $Subcategories
 * @property \App\Model\Table\LessonsTable|\Cake\ORM\Association\BelongsToMany $Lessons
 *
 * @method \App\Model\Entity\Vehicule get($primaryKey, $options = [])
 * @method \App\Model\Entity\Vehicule newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Vehicule[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Vehicule|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Vehicule patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Vehicule[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Vehicule findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class VehiculesTable extends Table
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

        $this->setTable('vehicules');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
        ]);
        $this->belongsTo('Subcategories', [
            'foreignKey' => 'subcategory_id'
        ]);
        $this->belongsTo('Subcourses', [
            'foreignKey' => 'subcourse_id'
        ]);
        $this->belongsToMany('Lessons', [
            'foreignKey' => 'vehicule_id',
            'targetForeignKey' => 'lesson_id',
            'joinTable' => 'lessons_vehicules'
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
            ->scalar('make')
            ->allowEmpty('make');

        $validator
            ->scalar('model')
            ->allowEmpty('model');

        $validator
            ->scalar('plate')
            ->allowEmpty('plate');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['subcategory_id'], 'Subcategories'));

        return $rules;
    }
}
