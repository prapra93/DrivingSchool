<h3>Pravith Vongphachanh</h3><br>
420-267 MO Développer un site Web et une application pour Internet.<br>
Automne 2017, Collège Montmorency.<br>
<br>
Intérêts du site web:<br>

Le site web gère la gestion d’une école de conduite. L’administrateur et les employées peuvent rentrer des leçons.<br>  
L’employé pourra réserver un véhicule pour la leçon donnée. L’administrateur est celui qui gère de rentrer les véhicules disponible sur le site.<br>
<br>  
TP3:<br> 
<br>
Utilisateur utilisé tout au long du TP3:<br>
user: admin@admin.com<br>
password : admin<br>
<br>
Testé sur Mozilla firefox<br>
<br>
Fonctionnel:<br>
-Liste liée en AngularJS dans la section "New Vehicule"<br>
-Changement de mot de passe dans la section "List Users" avec token(?)<br>
-CRUD en AngularJS dans la section "List Vehicule"<br>
<br>
Non-fonctionnel:<br>
-fonction Edit en AngularJS<br>
-Démarrage de session<br>  
<br>
TP2:<br> 
Fonctionnel:<br>
-AutoCompletion dans Véhicules<br>
-Categories et Subcatefories dans "New Vehicule" et "Edit"<br>
-Envoie de courriel de confirmation quand on crée un nouvel utilisateur<br>
-PDF dans la liste action de Lessons<br>
<br>
Non-fonctionnel:<br>
-test unitaire -> entrave avec le captcha<br>
<br>
Seulement les admins peuvent ajouter un véhicule. Les visiteurs et employer peuvent juste voir.<br>
<br>



<?php echo $this->Html->image('schemaDB2.png', ['alt' => 'Schema']);?> <br>

<?php echo $this->Html->link('http://www.databaseanswers.org/data_models/driving_school/index.htm');?><br>

