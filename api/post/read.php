<?php

// Headers
// REST API access via http

// header function - public API access {no authorisation required) *

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/Post.php';

// Instantiate DB & connect;

$database = new Database();
$db = $database->connect();

// Instantiate blog post obj and read;

$post = new Post($db);
// Blog post query

$result = $post->read();

// Get row count

$num = $result->rowCount();

// Check if any posts

if ($num > 0) {
   // Post array
   $posts_arr = array();
   $posts_arr['data'] = array();

   while($row = $result->fetch(PDO::FETCH_ASSOC)){

       //extract row col content as variables
       extract($row);

       $post_item = array(

           'id' => $id,
           'title' => $title,
           'body' => html_entity_decode($body),
           'author' => $author,
           'category_id' => $category_id,
           'category_name' => $category_name


           );

           // Created an array for "posts"
           // Created a an array into posts array with the assigned value 'data'
           // declared a standard or a structure for the requested data
           // pushing the "gathered" data from post_item declaration into posts_arr['data'];

           //Push to "data"

           array_push($posts_arr['data'], $post_item);


   }

   // Turn to JSON & output
   // get the data in JSON FORMAT

   echo json_encode($posts_arr);

} else {

    // No posts

    echo json_encode(array('message' => 'No Posts Found'));


}
