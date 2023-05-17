# The Arkive
#### A project completed for my Database and DB Design class. To be utilized by my dad to track his vast music collection.

<span>____</span>

This database was designed, normalized, and implemented over the course of a few months, and I utilized the Database Life Cycle (DBLC) in the process.
Below, you'll find a basic glossary detailing the database schema, and a few other tidbits of information. For the sake of reducing complexity in the class, 
datatypes were ignored for table fields. However, the datatypes should be relatively easy to infer.

<span>____</span>

## The Process

SECTION TO BE COMPLETED ...

## The Schema

1. **Tables**:

   - **Session**: An umbrella term for tracks that make up an event, album, or anything in that realm.
     - **(PK)** Session ID
     - Title
     - Release Date (formatted as yyyy-mm-dd)
     - Description (a one line description of the session


   - **Artist**: Self explanatory, very basic table that contains all artists found in the collection.
     - **(PK)** Artist ID
     - Full Name (first and last)


   - **Track**: An individual composition, performance, or song found in a session. 
     - **(PK)** Track ID
     - **(FK)** Session ID
     - **(FK)** Artist ID
     - Title
     - Length (formatted as mm:ss)


   - **Session Note**: A relatively lengthy detailing of a session, or tracks within that session.
     - **(PK)** Note ID
     - **(FK)** Session ID
     - Content 


   - **Attachment**: Contains (granular) paths for attachments relating to a session, to be used for lookup or pointing.
     - **(PK)** Attachment ID
     - **(FK)** Session ID
     - Directory
     - File Name
     - Extension

2. **Relationships**:

   - Below are all of the existing relationships, including verbs and cardinality.
     - **Session** *contains* **Attachment** (one to many)
     - **Session** *described by* **Session Notes** (one to many)
     - **Session** *and* **Artist** *form* **Track** (many to many)
 
 ## Queries

Four basic queries were created for this project, but many more are necessary for a fully functional database. This project is intended to be continued
and adapted into a web interface, so various other tables and fields may be required, as well. Since the database is in its infancy, it should also be 
expected to be implemented in a DBMS with higher performance and control. MS Access will likely not make the cut for web purposes. 

SECTION TO BE EXPANDED...
