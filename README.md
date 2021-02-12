# Cloud-Computing
Group member:  
Shuo Wang, Mingjin Yeh
## Book Lake Project
![picture1](/Book/ Lake/image/Console.png)
This project apply the cloud computing concept and design a highly scalable application. From this point, we have utilized Google App Engine, Google cloud storage, Google book API, Google virtualization API and AWS simple storage. The following report details the work we have done. Our application provides a user-friendly interface to access the online books in google book database. The search function returns the accurate results with the basic information to appease the users. With the help of APIs, the product provides an online reading platform for book lovers. We also devote to aquire data from various sources. It gave us a chance to exam and excel those cutting-edge products from the field. Authentication is the other feature that we have implemented in our product. In all, the web application has the potential to become a real product with more research on UI and UE design.  
![picture2](/Book Lake/image/Structure.png)
### Software design/architecture
1. Google books API v1(Experimental):
This API can perform full-text searches and retrieve book information with the following methods described in the Google Books Developer Guide [1].  
⚫ Search and browse through the list of books that match a given query.  
⚫ View information about a book, including metadata, availability and price, links to the
preview page.  
⚫ Manage your own bookshelves.  
2. Google embedded viewer API  
This API can allow book contents which come from Google books directly in the web pages with JavaScript.
3. Google App Engine
The website is presented in the google app engine because developer and user can get lots of benefits from it. Google App Engine[3] is a fully managed, serverless platform for developing and hosting web applications at scale and different popular computer languages, libraries, and frameworks can be selected to develop these apps, which means it can take care of provisioning servers and automatically scaling app instances based on demand.  
4. Google visualization API  
It can present data values to a chart which is easier to see the difference and the pattern. 5. Google Cloud Storage
This storage can be available in the world-wide storage and retrieval of any amount of data. In our applications, this one is used to store users’ information and a dataset which is used to be analysed by generating a pie chart.  

5. Google Cloud Storage
This storage can be available in the world-wide storage and retrieval of any amount of data. In our applications, this one is used to store users’ information and a dataset which is used to be analysed by generating a pie chart.  

6. S3 Bucket  
Store an image which is presented in the website

Rest of files are testing files.
 
