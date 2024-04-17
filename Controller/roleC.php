<?php

    require_once '../Assets/Utils/config.php';
    require_once '../Model/role.php';


    Class roleC {


        
        function afficherrole()
        {
            $requete = "select * from role";
            $config = config::getConnexion();
            try {
                $querry = $config->prepare($requete);
                $querry->execute();
                $result = $querry->fetchAll();
                return $result ;
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }
        function getrolebyID($idrole)
        {
            $requete = "select * from role where idrole=:idrole";
            $config = config::getConnexion();
            try {
                $querry = $config->prepare($requete);
                $querry->execute(
                    [
                        'idrole'=>$idrole
                    ]
                );
                $result = $querry->fetch();
                return $result ;
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }

        function ajouterrole($role)
        {
            $config = config::getConnexion();
            try {
                $querry = $config->prepare('
                INSERT INTO role 
                (idrole,titre)
                VALUES
                (:idrole,:titre)
                ');
                $querry->execute([
                    'idrole'=>$role->getidrole(),
                    'titre'=>$role->gettitre(),
                    
                ]);
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }
        function modifierrole($role)
        {
            $config = config::getConnexion();
            try {
                $querry = $config->prepare('
                UPDATE role SET
                titre=:titre 
                where idrole=:idrole
                ');
                $querry->execute([
                    'idrole'=>$role->getidrole(),
                    'titre'=>$role->gettitre()

                ]);
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }

        function supprimerrole($idrole)
        {
            $config = config::getConnexion();
            try {
                $querry = $config->prepare('
                DELETE FROM role WHERE idrole =:idrole
                ');
                $querry->execute([
                    'idrole'=>$idrole
                ]);
                
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }
    }

?>