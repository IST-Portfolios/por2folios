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

## Development Environment Setup

- Install [VirtualBox]
- Install [Vagrant]
- Install [git]

(If you are using Windows consider using the [suggestion](#windows-suggestion) below)

#### 1. Install [VVV (Varying Vagrant Vagrants)]
```sh
git clone https://github.com/Varying-Vagrant-Vagrants/VVV.git
```
#### 2. Install [Variable VVV]
```sh
git clone https://github.com/bradp/vv.git
```
After clone, add the folder to the system path.
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
Following the example in the step 5, the mappins you should add are:
```sh
192.168.50.4  vvv
192.168.50.4  vvv.dev
192.168.50.4  local.wordpress.dev
192.168.50.4  src.wordpress-develop.dev
192.168.50.4  build.wordpress-develop.dev
192.168.50.4  por2folio.dev
```
#### 7. DONE!
Now that everything is set up, you should be able to go to the Dashboard (if instaled on step 3) in <http://vvv.dev>, or to the website you created using the given URL (in the above example <http://por2folio.dev>).
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

[Chocolatey]: <https://chocolatey.org/>
[git]: <https://git-scm.com/>
[Vagrant]: <https://www.vagrantup.com/>
[Variable VVV]: <https://github.com/bradp/vv>
[VirtualBox]: <https://www.virtualbox.org/>
[VVV (Varying Vagrant Vagrants)]: <https://github.com/Varying-Vagrant-Vagrants/VVV>
[VVV-Dashboard]: <https://github.com/topdown/VVV-Dashboard>
