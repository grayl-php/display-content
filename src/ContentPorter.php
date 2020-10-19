<?php

   namespace Grayl\Display\Content;

   use Grayl\Display\Content\Controller\ContentController;
   use Grayl\Display\Content\Entity\ContentData;
   use Grayl\File\FilePorter;
   use Grayl\Mixin\Common\Traits\StaticTrait;

   /**
    * Front-end for the Content package
    *
    * @package Grayl\Display\Content
    */
   class ContentPorter
   {

      // Use the static instance trait
      use StaticTrait;

      /**
       * The directory path where content files are stored
       *
       * @var string
       */
      private string $content_dir;


      /**
       * The class constructor
       */
      public function __construct ()
      {

         // Set the content directory path
         $this->content_dir = dirname( $_SERVER[ 'DOCUMENT_ROOT' ] ) . '/resource/content/';
      }


      /**
       * Creates a ContentController
       *
       * @param string $id The unique ID of the content
       *
       * @return ContentController
       */
      public function newContentController ( string $id ): ContentController
      {

         // Return the controller
         return new ContentController( new ContentData( $id ) );
      }


      /**
       * Creates a ContentController from multiple files
       *
       * @param string   $id    The unique ID of the content
       * @param string[] $files An array of content files to import
       *
       * @return ContentController
       * @throws \Exception
       */
      public function newContentControllerFromFiles ( string $id,
                                                      array $files ): ContentController
      {

         // Request the controller
         $controller = $this->newContentController( $id );

         // Loop through each content file and import it
         foreach ( $files as $file ) {
            // Create a new ContentFile entity for this file using the factory
            $content_file = FilePorter::getInstance()
                                      ->newFileController( $this->content_dir . $file );

            // Import the ContentFile entity into the controller
            $controller->setContents( $content_file->getIncludedFile() );
         }

         // Return the controller
         return $controller;
      }

   }