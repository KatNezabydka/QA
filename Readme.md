## Smart Tribune - Backend - Coding Test :

Use PHP7 & Symfony 4.4 or 5 and MariaDB or PostgreSQL database.
Unit Tests are mandatory. 
Also provide a documentation / readme file to explain how to run the project.
We expect you to provide source code through a git repository with database schemas if needed.

#### Introduction 

Based on this JSON payload as Question & Answer document. You need to store it in a database.

{
  "title": string - required
  "promoted": boolean - required,
  "created": datetime - required,
  "updated": datetime - required,
  "status": enum - required 
  "answers": [{
    "channel": enum - required,
    "body": string - required
  }]
}


##### Step 1:

Create an API to receive this Q&A and store in a database.

Constraints : 
Answers.channel value is restricted to "faq" or "bot"
Status value is restricted to "draft" or "published"


##### Step 2:

1. Update existing Q&A to change Title value as well as Status. 
2. Listen to changes and populate asynchronously a new DB table (Question Historic) to store all changes applied on the question with only updated fields (title, status, updated). The idea is to store only the new value for those fields.

##### Step 3:

1. Create a generic exporter
2. Create a Symfony command that will use the previously created exporter in order to export the historic table as a CSV file 

##### Bonus:

2. Dockerize the project and provide related readme file