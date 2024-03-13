<?php

  require_once("globals.php");
  require_once("db.php");
  require_once("model/movie.php");
  require_once("model/review.php");
  require_once("model/message.php");
  require_once("dao/UserDAO.php");
  require_once("dao/MovieDAO.php");
  require_once("dao/ReviewDAO.php");

  $message = new Message($BASE_URL);
  $userDao = new UserDAO($conn, $BASE_URL);
  $movieDao = new MovieDAO($conn, $BASE_URL);
  $reviewDao = new ReviewDAO($conn, $BASE_URL);

  $userData = $userDao->verifyToken(); //RESGATA DADIS DO USUÁRIO

  $type = filter_input(INPUT_POST, "type");  //RECEBE O TIPO DO FORMULÁRIO



  if($type === "create"){
    $rating = filter_input(INPUT_POST, "rating");
    $review = filter_input(INPUT_POST, "review");
    $users_id = $userData->id;
    $movies_id = filter_input(INPUT_POST, "movies_id");
    
    $reviewObject = new Review();
    $movieData = $movieDao->findById($movies_id);
 
    
    //VALIDANDO SE O FILME EXISTE
    if($movieData){
        if(!empty($rating) && !empty($review) && !empty($movies_id)){  //VERIFICA DADOS MÍNIMOS

            $reviewObject->rating = $rating;
            $reviewObject->review = $review;
            $reviewObject->movies_id = $movies_id;
            $reviewObject->users_id = $users_id;

            $reviewDao->create($reviewObject);

        }else{
            $message->setMessage("Insira uma nota e um comentário!", "error", "index.php");
            
        }
    }else{
        $message->setMessage("Informações inválidas!", "error", "index.php");
    }

  
  }else{
    $message->setMessage("Informações inválidas!", "error", "index.php");
  }