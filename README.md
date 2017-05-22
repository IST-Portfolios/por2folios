# por2folios
The Por2folios Platform is intended to be a repository of past Activities performed, including: 
- classification by areas,  
- descriptions and execution methods  
- Promoter Entities  
- Student Reports  

Development of the Platform, considering: 
- [Modules for parsing associated Metadata](https://github.com/IST-Portfolios/por2folios/milestone/1) 
- [Modules for Presentation and Retrieval of documents](https://github.com/IST-Portfolios/por2folios/milestone/1)  
- [Selectors (by category, type, Promoter, names, etc.)](https://github.com/IST-Portfolios/por2folios/milestone/1) 
- [Rating forum](https://github.com/IST-Portfolios/por2folios/milestone/1) 

# Table of contents

- [Development Environment Setup](#development-environment-setup)
- [Server Setup](#server-setup)
- [TODO](#todo)

## Development Environment Setup

- Install [VirtualBox]
- Install [Vagrant]
- Install [git]

If you are using macOS you can install these programs using homebrew:
```sh
brew cask install virtualbox
brew cask install vagrant
brew install git
```

If you are using Linux (Debian-based distros like Ubuntu) you can install these programs using apt-get:
```sh
sudo apt-get install virtualbox
sudo apt-get install vagrant
sudo apt-get install git
```

If you are using Windows consider using the [suggestion](#windows-suggestion) below.

#### 1. Install [VVV (Varying Vagrant Vagrants)]
```sh
git clone https://github.com/Varying-Vagrant-Vagrants/VVV.git
```
#### 2. Install [Variable VVV]
##### Windows
```sh
git clone https://github.com/bradp/vv.git
```
After clone, add the folder to the system path.
##### MacOS
If you are using macOS you can install Variable VVV using homebrew:
```sh
brew install bradp/vv/vv
```
##### Linux
```sh
git clone https://github.com/bradp/vv.git
```
After clone, go to the folder where you cloned vv into and copy vv executable to /usr/local/bin:
```sh
sudo cp vv /usr/local/bin
```
#### 3. Install [VVV-Dashboard] (optional)
Clone the repository to the VVV/www/default directory (the VVV directory is the one created on the first step).
```sh
cd www/default
git clone https://github.com/topdown/VVV-Dashboard.git dashboard
cp dashboard/dashboard-custom.php .
```
#### 4. Create and launch the virtual machine and install Worpress
Go to you VVV/ directory, and do the command:
```sh
vagrant up
```
After launching the virtual machine you can access the VM through ssh:
```sh
vagrant ssh
```
#### 5. Create website
Using the terminal on Linux or the Git Bash on Windows insert this command:
```sh
vv create
```
You will get an error asking you where VVV is installed. When asked insert the path to the VVV/ directory.
Afer this, complete the wizard with the info you want to your website.
E.g:
```sh
Name of new site directory: por2folio
Domain to use (leave blank for Test.dev):
WordPress version to install (leave blank for latest version or trunk for trunk/nightly version):
Install as multisite? (y/N): N
Git repo to clone as wp-content (leave blank to skip):
Local SQL file to import for database (leave blank to skip):
Remove default themes and plugins? (y/N): N
Add sample content to site (y/N): N
Enable WP_DEBUG and WP_DEBUG_LOG (y/N): y
Continue (y/n)? : y
```
If the installation was completed successfully you shoul see something like this:
```sh
[Success] New VVV Site Setup: Done!
Directory: <path_to_VVV>/VVV/www/por2folio
URL:       por2folio.dev
Username:  admin
Password:  password
```
#### 6. Add the URLs to the 'hosts' file
Add to the file 'hosts' the mapping of the IP adresses to host names.
```sh
192.168.50.4  vvv
192.168.50.4  vvv.dev
192.168.50.4  local.wordpress.dev
192.168.50.4  src.wordpress-develop.dev
192.168.50.4  build.wordpress-develop.dev
192.168.50.4  <URL selected in the step 5>
```
Following the example in the step 5, the mappings you should add are:
```sh
192.168.50.4  vvv
192.168.50.4  vvv.dev
192.168.50.4  local.wordpress.dev
192.168.50.4  src.wordpress-develop.dev
192.168.50.4  build.wordpress-develop.dev
192.168.50.4  por2folio.dev
```
#### 7. Sync with Github
##### 7.1. Create a new branch from the Produciton Server version
If you want to start developing a new feature using the current Production Server version:
First go to the 'wp-content' directory of the website you created using vv and:
```sh
rm -rf
```
Now that you deleted the default 'wp-content' folder, get 'wp-content' used on the Production Server:
```sh
git clone git@github.com:IST-Portfolios/por2folios.git .
git checkout -b <new_branch_name>
git push origin <branch_name>
```
##### 7.2. Continue developing from an already created branch
First go to the 'wp-content' directory of the website you created using vv and:
```sh
rm -rf
```
Now that you deleted the default content of the 'wp-content' folder, get 'wp-content' used on the desired branch:
```sh
git clone -b <branch_name> git@github.com:IST-Portfolios/por2folios.git .
```
#### 8. Sync Database
#### 9. DONE!
Now that everything is set up, you should be able to go to the Dashboard (if instaled on step 3) in <http://vvv.dev>, or to the website you created using the given URL (in the above example <http://por2folio.dev>).

#### NOTES:
To keep the information up to date with Github, go to the wp-content folder and:
```sh
git pull
```
### Windows Suggestion
Install [Chocolatey] (a Packet Manager for Microsoft Windows) and then use it to install the needed software.
To install Chocolatey open the the Windows Command Prompt as Administrator and insert:
```sh
@powershell -NoProfile -ExecutionPolicy Bypass -Command "iex ((New-Object System.Net.WebClient).DownloadString('https://chocolatey.org/install.ps1'))" && SET "PATH=%PATH%;%ALLUSERSPROFILE%\chocolatey\bin"
```
After installing Chocolatey, install the needed software:
#### git:
```sh
C:\> choco install git
```

#### VirtualBox:
```sh
C:\> choco install virtualbox
```

#### Vagrant:
```sh
C:\> choco install vagrant
```
## Server Setup

#### 1. Install Wordpress on the server
You can install manually (if you choose this option install it and jump to step 2) or using a script (if the Server OS is Ubuntu Server). If you want to install with the script you can do it this way:
##### 1.1. Download the script
Insert the following command in the server terminal:
```sh
wget -O installwp.sh goo.gl/iBP6mm
```
##### 1.2. Edit the script
Edit the first block of variables, replacing the usernames, passwords, etc., with the ones you want.
```sh
nano installwp.sh
```
##### 1.3. Run the script
The script will install nginx, PHP, MySQL and Wordpress.
```sh
sh installwp.sh
```
By the end of the script's execution you should be able to see Wordpress installed on the domain you inserted in the script in the previous step.
#### 2. Get Github repository content
##### 2.1. Development Server
First go to the 'wp-content' directory of the website and:
```sh
rm -rf
```
Now that you deleted the default content of the 'wp-content' folder, get 'wp-content' used on the desired branch:
```sh
git clone -b <branch_name> git@github.com:IST-Portfolios/por2folios.git .
```
##### 2.2. Production server
First go to the 'wp-content' directory of the website and:
```sh
rm -rf
```
Now that you deleted the default 'wp-content' folder, get 'wp-content' used on the Production Server:
```sh
git clone git@github.com:IST-Portfolios/por2folios.git .
```
## TODO

### Development Environment
- Test syncing with Github
- Test plugin to get the database from the production server

### Development Server
- Set up the server
- Test syncing with Github
- Test plugin to get the database from the production server

### Production Server
- Set up the server
- Install plugin to migrate and backup the database
- Test syncing with Github (master branch)
- Test Webhook

### README.MD
- In Development Environment Setup section
  - Add Database sync steps
- In Server Setup section
  - Add Database sync steps
  - Add creation of webhook to auto pull content from github when new content is pushed to the main branch steps
  
[Chocolatey]: <https://chocolatey.org/>
[git]: <https://git-scm.com/>
[here]: <https://www.ubuntu.com/download/server>
[Vagrant]: <https://www.vagrantup.com/>
[Variable VVV]: <https://github.com/bradp/vv>
[VirtualBox]: <https://www.virtualbox.org/>
[VVV (Varying Vagrant Vagrants)]: <https://github.com/Varying-Vagrant-Vagrants/VVV>
[VVV-Dashboard]: <https://github.com/topdown/VVV-Dashboard>
