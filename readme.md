# IT490 Final Project
# Front-End Implementation
***
**This guide assumes that you have RabbitMQ pre-installed, as it would take too long to explain how to do that here. If you do not have it installed on your Ubuntu machine, please view the following link to do so:
  https://www.digitalocean.com/community/tutorials/how-to-install-and-manage-rabbitmq**
***
This git repository contains the Front-End (called FE from now on) division of a four-way server for requesting, collecting, and displaying card data for a user, allowing them to create decks with said data, and speak on a message forum using phpBB. The following are requirements to properly installing this division:

  1. An Ubuntu machine with a user with full administrative access

Yup! That's really all you need! So, let's begin.
***
## Step 1: Installing All Necessary Packages
Before anything from this repository can be installed onto your machine, your machine needs to have the latest packages for Apache, PHP, MySQL, RabbitMQ, and a few more. Go ahead and open up a terminal and type in the following lines of code **IN ORDER**:

  1. `sudo apt-get update`
  2. `sudo export DEBIAN_FRONTEND=noninteractive`
  3. `sudo -E apt-get -y install apache2 mysql-server mysql-client php7.0 php7.0-mysql php7.0-gd imagemagick unzip`

(**MySQL would also take some time to explain, so please view the following link to be guided on installing it: https://www.digitalocean.com/community/tutorials/how-to-install-mysql-on-ubuntu-16-04**)
***
## Step 2: Installing phpBB
Once all of the packages install, you should now have a directory titled `/var/www/html` that contains the basic web server files. Here is where we will be installing the repository files and phpBB, a necessary additive for the FE. Please make an extension to the directory and be within `/var/www/html/theForum`. This specific name is crucial for the installation.

Once there, go ahead and install phpBB using that path and this guide: https://www.digitalocean.com/community/tutorials/how-to-install-phpbb-on-ubuntu-14-04

**BE SURE TO USE UPDATED CODE IN THE ABOVE GUIDE OR ELSE THE FE WILL BE BROKEN**
***
## Step 3: Install the Repository
Now that you have successfully installed all of the necessary packages and add-ons from the previous two step, go right ahead and delete all files in the `/var/www/html` directory **EXCEPT** for `./theForum/`!! Those files will not be needed. Now, use the following lines to pull the repository:

  1. `sudo git clone https://github.com/afv4/IT490Midway.git`
  2. `sudo git checkout FinalBranch`

Once that is done, make sure all of the files that you pull are in `/var/www/html` and have overwrited everything there!
