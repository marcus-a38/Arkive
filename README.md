# The Arkive

A comprehensive music collection maintained by two music collection hobbyists and a developer.

---

## About

Over the course of several decades, my dad has collected a substantial heap of music material. 
He has amassed around 1 TB in audio files and relevant multimedia documents as a huge fan of 
afrofuturism, jazz, vintage music, records, and more. 

In early 2023, I began work on designing a database to organize this vast collection, and to
provide a simple mechanism with a friendly interface for my dad to use in his music-related activities.
The idea has evolved into a public databank where fellow hobbyists will eventually explore and 
chat about unique and novelty tracks.

In late 2023, I began work on the frontend web component of the project. As of December 2023, the
website is *not* complete, but simple functionalities have been established in regards to session
handling and the API. Bootstrap is used liberally throughout the website as a frontend framework for convenience.

---

*I am willing to discuss the possibility of collaboration. Please
contact me at **contact@marcusantonelli.com** with any inquiries.*

---

## Database

### Schema

The database has a total of 9 tables and 40 individual columns. The tables and columns are listed below, 
with each column's attributes and datatype alongside.

1. **artist**
   - **id:** pk, int(10), unsigned, auto_increment
   - **name:** varchar(48)
     
2. **attachment**
   - **id:** PK, int(10), unsigned, auto_increment
   - **directory_id:** fk, cascade
   - **track_id:** fk, cascade
   - **filename:** varchar(256)
   - **extension:** char(3)
     
3. **directory**
   - **id:** pk, int(10), unsigned, auto_increment
   - **name:** varchar(48)
     
4. **post**
   - **id:** pk, int(10), unsigned, auto_increment
   - **user_id:** fk, cascade
   - **parent_id:** fk, cascade
   - **content:** varchar(512)
   - **timestamp:** timestamp
     
5. **session**
    - **id:** pk, int(10), unsigned, auto_increment
    - **title:** varchar(56), null
    - **release_date:** date, null
    - **description:** tinytext, null
      
6. **session_note**
    - **id:** pk, int(10), unsigned, auto_increment
    - **session_id:** fk, cascade
    - **content:** text
      
7. **track**
    - **id:** PK, int(10), unsigned, auto_increment
    - **session_id:** fk, cascade
    - **artist_id:** fk, cascade
    - **user_id:** fk, cascade
    - **title:** varchar(56), null
      
8. **user**
    - **id:** pk, int(10), unsigned, auto_increment
    - **username:** varchar(16)
    - **email:** varchar(256)
    - **password:** varchar(72)
    - **security_q:** tinyint(1)
    - **security_a:** varchar(256)
    - **timestamp:** timestamp
    - **ip_address:** bigint(20), unsigned
    - **promo:** tinyint(1), unsigned
    - **usertype:** tinyint(1), unsigned
      
9. **vote**
    - **id:** pk, int(10), unsigned, auto_increment
    - **post_id:** fk, cascade
    - **user_id:** fk, cascade
    - **is_dislike:** tinyint(1), unsigned

### Relationships

There's a total of 10 relationships in the database, with one self-referencing relationship in the "Post" table.
Each of the relationships are listed below, with the referenced and FK columns and cardinality included.

1. **Attachment** _located in_ **Directory**
   - **Cardinality:** _One-to-Many (Optional)_
   - **Referenced Column:** _directory.id_
   - **FK Column:** _attachment.directory_id_

2. **Post** _commented on_ **Post** [SELF-REFERENCING]
   - **Cardinality:** _One-to-Many (Optional)_
   - **Referenced Column:** _post.id_
   - **FK Column:** _post.parent_id_
3. To be added ....

## Web

### PHP, MySQL, and API

### JavaScript, CSS, & Bootstrap
