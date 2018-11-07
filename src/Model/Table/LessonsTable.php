<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Lessons Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\FilesTable|\Cake\ORM\Association\BelongsToMany $Files
 * @property \App\Model\Table\VehiculesTable|\Cake\ORM\Association\BelongsToMany $Vehicules
 *
 * @method \App\Model\Entity\Lesson get($primaryKey, $options = [])
 * @method \App\Model\Entity\Lesson newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Lesson[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Lesson|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Lesson patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Lesson[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Lesson findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class LessonsTable extends Table
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
        $this->addBehavior('Translate', ['fields' => ['title', 'description', 'price']]);

        $this->setTable('lessons');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsToMany('Files', [
            'foreignKey' => 'lesson_id',
            'targetForeignKey' => 'file_id',
            'joinTable' => 'lessons_files'
        ]);
        $this->belongsToMany('Vehicules', [
            'foreignKey' => 'lesson_id',
            'targetForeignKey' => 'vehicule_id',
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
            ->scalar('title')
            ->allowEmpty('title');

        $validator
            ->scalar('description')
            ->allowEmpty('description');

        $validator
            ->scalar('price')
            ->allowEmpty('price');

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

        return $rules;
    }

    public function isOwnedBy($lessonId, $userId)
    {
        return $this->exists(['id' => $lessonId, 'user_id' => $userId]);
    }
}
