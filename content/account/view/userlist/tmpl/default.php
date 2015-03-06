<?php
 
 
$kayttajalista=$this->kayttajalista;

 

/*$kayttajalista[0]["username"]='pekka';
$kayttajalista[0]['password']='passu';
$kayttajalista[0]['userrole']='admin';
$kayttajalista[0]['email']='gmailari@gmail.com';
$kayttajalista[0]['homepage']='uta.fi';*/






?>


<table class="USERS:">

                <thead>
                <tr>
                <th>username</th>
                <th>password</th>
                <th>userrole </th>
                <th> </th>
                <th> </th>;
                <th>email    </th>
                <th>homepage </th>
                </tr>
                </thead>
            <?php foreach ($kayttajalista as $kayttaja){
                echo'<tbody>';
                echo'<tr>'; 
                echo'<td>'. $kayttaja['username']."</td>";
                echo'<td>'. $kayttaja['password'].'</td>';
                echo'<td>'. $kayttaja['userrole'].'</td>';
                echo'<th> </th>';
                echo'<th> </th>';
                echo'<td>'. $kayttaja['email'].'</td>';
                echo'<td>'. $kayttaja['homepage'].'</td>';
                
                echo'<tr>';
                echo'</tbody>';
              }
            ?>


        </table>



 