<?php
class model_game {
    private $id;
    private $nume;
    private $description;
    private $image;
    private $link;

    function __construct($description, $id, $image, $link, $nume, $rate)
    {
        $this->description = $description;
        $this->id = $id;
        $this->image = $image;
        $this->link = $link;
        $this->nume = $nume;
        $this->rate = $rate;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getDescription()
    {
        return $this->description;
    }
    private $rate;

    public static function getCategory($id_game){
        $db=model_database::get_instance();
        try{
            $stmt= $db->prepare("
            select * from categories,(
            select * from rel_games_categories where id_games= ?) as category
            where id=id_categories

            ");
            $stmt->execute(array($id_game));
            if($result=$stmt->fetch())
            return new model_category($result['id'],$result['nume']);
        }
        catch(Exception $e){print($e->getMessage());}
    }

    public static function load($id){

        $db=model_database::get_instance();
        try{
        $stmt = $db->prepare("select * from games where id=?");
            $stmt->execute(array($id));

            $result=$stmt->fetch();
            $game=new model_game($result['description'],
            $result['id'],$result['image'],$result['link'],
            $result['nume'],$result['rate']);
            return $game;
        }
        catch(Exception $e)
        { print("Error ".$e);die();}
    }

    public static function search($id_cateogry){
        try{
            $list_game=array();
            $db=model_database::get_instance();
            $stmt=$db->prepare("select * from games inner join
            (select * from rel_games_categories where id_categories=?) as cat
            on id=id_games");
            $stmt->execute(array($id_cateogry));
            while($row=$stmt->fetch())
            {
                $game=model_game::load($row['id']);
                $list_game[]=$game;
            }
            return $list_game;
        }
        catch(Exception $e){print("ERROR".$e->getMessage());die();}
    }

    public static function getLastGame($limit){
        try{
            $list_game=array();
            $db=model_database::get_instance();
            $stmt=$db->prepare("select * from games order by id desc limit ? ;");
            $stmt->bindParam(1,$limit,PDO::PARAM_INT);
            $stmt->execute();
            while($row=$stmt->fetch())
            {
                $game=model_game::load($row['id']);
                $list_game[]=$game;
            }
            return $list_game;
        }
        catch(Exception $e){print("ERROR".$e->getMessage());die();}
    }

    public static function save($game){
        try{
            $db=model_database::get_instance();
            $stmt=$db->prepare("insert into games (nume,description,image,link,rate)
            values (?,?,?,?,?)");
            $stmt->execute(array(
                $game->getNume(),
                $game->getDescription(),
                $game->getImage(),
                $game->getLink(),
                $game->getRate()
            ));
            return new model_game($game->getDescription(),
            $db->lastInsertId(),$game->getImage(),$game->getLink(),
            $game->getNume(),$game->getRate());
        }
        catch(Exception $e){print("ERROR".$e->getMessage());die();}
    }

    public static function saveCategory($id_game,$id_category){
        try{
            $db=model_database::get_instance();
            $stmt=$db->prepare("insert into rel_games_categories values (? , ?)");
                $stmt->execute(array($id_game,$id_category));

        }
        catch(Exception $e){print("ERROR".$e->getMessage());die();}
    }

    public static function editCategory($id_game,$id_category){
        try{
            $db=model_database::get_instance();
            $stmt=$db->prepare("update rel_games_categories set id_categories=? where id_games=?");
            $stmt->execute(array($id_category,$id_game));

        }
        catch(Exception $e){print("ERROR".$e->getMessage());die();}
    }

    public static function edit($game){
        try{

            $stmt=model_database::get_instance()->prepare("select image from games where id=?");
            $stmt->execute(array($game->getId()));
            $image=$stmt->fetch();
            if(!empty($image['image']) && $image['image']!=$game->getImage()){
                unlink(dirname(APP_PATH)."/img/".$image['image']);}

            $stmt=model_database::get_instance()->prepare("update games
            set nume=? , description=? ,image=? ,link=?
            where id=?");
            $stmt->execute(array(
               $game->getNume(),
                $game->getDescription(),
                $game->getImage(),
                $game->getLink(),
                $game->getId()
            ));
        }
        catch(Exception $e){print("ERROR".$e->getMessage());die();}
    }

    public static function delete($id){
        try{
            $stmt=model_database::get_instance()->prepare("select image from games where id=?");
            $stmt->execute(array($id));
            $image=$stmt->fetch();
            if(!empty($image['image'])){
            unlink(dirname(APP_PATH)."/img/".$image['image']);}

            $stmt=model_database::get_instance()->prepare("delete from games where id=?")->
            execute(array($id));

        }
        catch(Exception $e){print("ERROR".$e->getMessage());die();}
    }

    public static function searchGame($name)
    {
        try{
            $list_game=array();
            $db=model_database::get_instance();
            $stmt=$db->prepare("select * from games where nume like ?");
            $stmt->execute(array("%".$name."%"));
            while($row=$stmt->fetch())
            {
                $_game=model_game::load($row['id']);
                $list_game[]=$_game;
            }
            return $list_game;
        }
        catch(Exception $e){print("ERROR".$e->getMessage());die();}
    }

    public static function getTopGame($limit){
        try{
            $list_game=array();
            $db=model_database::get_instance();
            $stmt=$db->prepare("select * from games order by rate desc limit ? ;");
            $stmt->bindParam(1,$limit,PDO::PARAM_INT);
            $stmt->execute();
            while($row=$stmt->fetch())
            {
                $game=model_game::load($row['id']);
                $list_game[]=$game;
            }
            return $list_game;
        }
        catch(Exception $e){print("ERROR".$e->getMessage());die();}
    }

    public static function vote($id_game,$id_user,$rate)
    {
        try{
            $db=model_database::get_instance();
            $stmt=$db->prepare("insert into rate values (?,?,?)");
            $stmt->execute(array($id_user,$id_game,$rate));
            $stmt=$db->prepare("update games set rate=
            (select AVG(rate) from rate where id_games= ?) where id= ?");
            $stmt->execute(array($id_game,$id_game));

        } catch(Exception $e){print("ERROR".$e->getMessage());die();}
    }

    public static function existFavorite($id_user,$id_game){
        try{
            $db=model_database::get_instance();
            $stmt=$db->prepare("select * from rel_users_games where id_users=? and id_games=?");
            $stmt->execute(array($id_user,$id_game));
            if($stmt->fetch()) return true;
            return false;
        }
        catch(Exception $e){print("ERROR".$e->getMessage());die();}
    }




    public static function addFavorite($id_user,$id_game){
        try{
            $db=model_database::get_instance();
            $stmt=$db->prepare("insert into rel_users_games values (?,?)");
            $stmt->execute(array($id_user,$id_game));

        }
        catch(Exception $e){print("ERROR".$e->getMessage());die();}
    }

    public static function removeFavorite($id_user, $id_game){
        $db=model_database::get_instance();
        try{
            $stmt=$db->prepare("DELETE FROM rel_users_games
                                WHERE id_users = ? AND id_games = ?");
            $stmt->execute(array($id_user, $id_game));
            return true;
        }
        catch(Exception $e){print("Error " . $e);}
    }

    public static function existVote($id_user,$id_game){
        try{
            $db=model_database::get_instance();
            $stmt=$db->prepare("select * from rate where id_users=? and id_games=?");
            $stmt->execute(array($id_user,$id_game));
            if($stmt->fetch()) return true;
            return false;
        }
        catch(Exception $e){print("ERROR".$e->getMessage());die();}
    }

    public static function getTopGameCategory($limit,$category){
        try{
            $list_game=array();
            $db=model_database::get_instance();
            $stmt=$db->prepare("select * from games
             inner join
            (select * from rel_games_categories where id_categories=?) as cat
            on id=id_games
             order by rate desc limit ? ;");
            $stmt->bindParam(1,$category,PDO::PARAM_INT);
            $stmt->bindParam(2,$limit,PDO::PARAM_INT);
            $stmt->execute();
            while($row=$stmt->fetch())
            {
                $game=model_game::load($row['id']);
                $list_game[]=$game;
            }
            return $list_game;
        }
        catch(Exception $e){print("ERROR".$e->getMessage());die();}
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setLink($link)
    {
        $this->link = $link;
    }

    public function getLink()
    {
        return $this->link;
    }

    public function setNume($nume)
    {
        $this->nume = $nume;
    }

    public function getNume()
    {
        return $this->nume;
    }

    public function setRate($rate)
    {
        $this->rate = $rate;
    }

    public function getRate()
    {
        return $this->rate;
    }

}
