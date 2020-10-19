<?php

   namespace Grayl\Display\Content\Controller;

   use Grayl\Display\Content\Entity\ContentData;

   /**
    * Class ContentController
    * The controller for working with Content objects
    *
    * @package Grayl\Display\Content
    */
   class ContentController
   {

      /**
       * The ContentData instance to interact with
       *
       * @var ContentData
       */
      private ContentData $content_data;


      /**
       * The class constructor
       *
       * @param ContentData $content_data The ContentData instance to interact with
       */
      public function __construct ( ContentData $content_data )
      {

         // Setup the class
         $this->content_data = $content_data;
      }


      /**
       * Retrieves the value of a stored variable
       *
       * @param string $key The key name for the content needed
       *
       * @return mixed
       */
      public function getContent ( string $key )
      {

         // Get the content
         return $this->content_data->getContent( $key );
      }


      /**
       * Sets a single piece of content
       *
       * @param string $key   The key name for the content
       * @param mixed  $value The value of the content
       */
      public function setContent ( string $key,
                                   $value ): void
      {

         // Set the content
         $this->content_data->setContent( $key,
                                          $value );
      }


      /**
       * Sets multiple pieces of content using a passed array
       *
       * @param array $contents The associative array of content to set ( key => value )
       */
      public function setContents ( array $contents ): void
      {

         // Set the contents
         $this->content_data->setContents( $contents );
      }

   }