<?php

   namespace Grayl\Display\Content\Entity;

   use Grayl\Mixin\Common\Entity\KeyedDataBag;

   /**
    * Class ContentData
    * The entity for content data
    *
    * @package Grayl\Display\Content
    */
   class ContentData
   {

      /**
       * The unique ID of the content
       *
       * @var string
       */
      private string $id;

      /**
       * A KeyedDataBag that holds the content
       *
       * @var KeyedDataBag
       */
      private KeyedDataBag $content;


      /**
       * The class constructor
       *
       * @param string $id The unique ID of the content
       */
      public function __construct ( string $id )
      {

         // Set the class data
         $this->setID( $id );

         // Create the KeyedDataBag
         $this->content = new KeyedDataBag();
      }


      /**
       * Gets the ID
       *
       * @return string
       */
      public function getID (): string
      {

         // Return the ID
         return $this->id;
      }


      /**
       * Sets the ID
       *
       * @param string $id The unique ID of the content
       */
      public function setID ( string $id ): void
      {

         // Set the ID
         $this->id = $id;
      }


      /**
       * Retrieves the value of stored content
       *
       * @param string $key The key name for the content
       *
       * @return mixed
       */
      public function getContent ( string $key )
      {

         // Return the value
         return $this->content->getVariable( $key );
      }


      /**
       * Retrieves the entire array of content
       *
       * @return array
       */
      public function getContents (): array
      {

         // Return all content
         return $this->content->getVariables();
      }


      /**
       * Sets a single content
       *
       * @param string $key   The key name for the content
       * @param mixed  $value The value of the content
       */
      public function setContent ( string $key,
                                   $value ): void
      {

         // Set the content
         $this->content->setVariable( $key,
                                      $value );
      }


      /**
       * Sets multiple content using a passed array
       *
       * @param array $content The associative array of content to set ( key => value )
       */
      public function setContents ( array $content ): void
      {

         // Set the content
         $this->content->setVariables( $content );
      }

   }