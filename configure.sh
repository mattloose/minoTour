#!/bin/bash
# This script will configure minoTour for the first time.
echo "                 ,\`                                         .               "
echo "                 ,;.                                      \`;:               "
echo "                 \`;;;;                                  :;;'\`               "
echo "                  .;;;;;;;''':,..\`\`\`\`    \`\`\`\`..,:''';;;;;;'.                "
echo "                    ,;;;;;;;;;;;';;;;;;;;;;;;;;;;;;;;;;;;:                  "
echo "                     \`;;;;';;;;;;;';;;;;;;;';';;;;;;;;;'\`                   "
echo "                                 :;;;;;;;;;';\`                              "
echo "                                .;';;;;;;;;';'                              "
echo "                 \`;@@#@@@@@@#   ;;;;;;;;;;;;;;'  ,@@@@@@##@@:               "
echo "          \`@@@@@@@@@@@@@@@@@@   ;;;;;;;;;;;;;;'  ,@@@@@@@@@@@@@@@@##        "
echo "       @@@@@@@@@@@@@@@@@@@@@@+  :;;;;;;;;;;';;   @@@@@@@@@@@@@@@@@@@@@#\`    "
echo "      ,@@@@@@@@@@@@@@@@@@@@@@@   ;;;;;;;;;;;;+  \`#@@@@@@@@@@@@@@@@@@@@@#    "
echo "     @@@@@@@@@@@@@@@@@@@@@@@@@#\`  ,;;';;;;;;   #@@@@@@@@@@@@@@@@@@@@@@@@@;  "
echo "    \`#@@@@@@@@@@@@@@ @@@@@@@@@@@#   ,;;';'    @@@@@@@@@@#:,#@@@@@@@@@@@@@@  "
echo "     #@@@@@@@@@@@@       @@@@@@@@@@@,     +#@@@@@@@@@+      \`@@@@@@@@@@@@@  "
echo "     #@@@@@@@@@@@@        @@@@@@@@@@@#@@@#@@@@@@@@@@@        #@@@@@@@@@@@@  "
echo "     @@@@@@@@@@@@#         #@@@@@@@@@@@@@@@@@@@@@@@@         @@@@@@@@@@@@.  "
echo "      @@@@@@@@@@@@          @@@@@@@@@@@@@@@@@@@@@#\`          #@@@@@@@@@@+   "
echo "      :@@@@@@@@@@@           #@@@@@@@@@@@@@@@@@@@@          \`#@@@@@@@@@#    "
echo "        #@@@@@@@@@:           @@@@@@@@@@@@@@@@@@'           @@@@@@@@@@@     "
echo "        ,@@@@@@@@@@    \`\`     :@@@@@@@@@@@@@@@@#      \`\`    #@@@@@@@@@      "
echo "          '@@@@@@@@@@@@@@@#.   +@@@@@@@@@@@@@@#\`   @@@@@@#.#@@@@@@@#\`       "
echo "           ;#@@@@@@@@@@@@@@@   \`#@@@@@@@@@@@@@@   \`@@@@@@@@@@@@@@@#         "
echo "            .#@@@@@@@@@@@@@@\`   @@@@@@@@@@@@@@'   @@@@@@@@@@@@@@@@          "
echo "               :#@@@@@@@@@@@:   ,@@@@@@@@@@@@#    @@@@@@@@@@@@@\`            "
echo "                 @#@@@@@@@@@\`   \`#@@@@@@@@@@@@    @@@@@@@@@@@,              "
echo "                     ;@#@@@;     @@@@@@@@@@@@@     @@@@#@. inoTour initialisation script!                 "
echo "                       \`'@@      ##++++++++++'      #@:                     "
echo "                              .;;;;;;;;;;;;;;;;;                            "
echo "                             ,;';;;;;;;;;;;;;;;;;\`                          "
echo "                           .;';;;;;;;;;;';;;;;;;;';                         "
echo "                           ;;';';;;;;.\`\`\`,';;;';';''                        "
echo "                         '';;;';;\`           ;';;;;'',                      "
echo "                        ,;;;;;;;.             ';;;;;';                      "
echo "                         \`;;;;;,               ';;;';                       "
echo "                          ;;;;;\`               ';;;;.                       "
echo "                           \`';;,               ';;;                         "
echo "                           \`;;''               ;'';                         "
echo "                        ;;;;;;;';            \`;;;;;;''.                     "
echo "      Welcome to the  .;;;;;;;;;;;           :;;;;;;;;;;"
echo ""
echo "This script will configure the environment for minoTour on the recommended install platform on Amazon"
echo "Are you happy to proceed? (y/n)"
read proceed
check='y'
if [ "$proceed"	= "$check" ];
then
	echo "OK - lets begin."
else
	echo "OK - we'll exit now then."
	exit
fi
git pull
sudo apt-get update
sudo apt-get install -y lamp-server^
sudo apt-get install -y memcached php5-memcache
sudo apt-get install -y php5-curl php5-dev
sudo apt-get install -y libcache-memcached-perl
sudo apt-get install -y make
sudo apt-get install -y screen
sudo apt-get install -y php-mbstring
sudo apt-get install -y python python-setuptools python-dev build-essential libmysqlclient-dev python-wxtools python-wxgtk3.0 python-pip
sudo pip install watchdog MySQL-Python configargparse psutil BioPython numpy progressbar ws4py thrift dictdiffer twisted autobahn gooey h5py xmltodict jsonpatch python-memcached pandas
wget http://search.cpan.org/CPAN/authors/id/P/PM/PMORCH/Parallel-Loops-0.07.tar.gz
wget http://search.cpan.org/CPAN/authors/id/D/DL/DLUX/Parallel-ForkManager-0.7.9.tar.gz
tar -zxvf Parallel-ForkManager-0.7.9.tar.gz
tar -zxvf Parallel-Loops-0.07.tar.gz
cd Parallel-ForkManager-0.7.9
perl Makefile.PL
make
make test
sudo make install
cd ..
cd Parallel-Loops-0.07
perl Makefile.PL
make
make test
sudo make install
cd ..
rm -rf Parallel-ForkManager-0.7.9
rm -rf Parallel-Loops-0.07
rm -rf *.tar.gz
sudo /etc/init.d/mysql stop
sudo sed -i '/bind-address		= 127.0.0.1/c\# bind-address		= 127.0.0.1/'  /etc/mysql/mysql.conf.d/mysqld.cnf
sudo sed -i '/max_allowed_packet	= 16M/c\max_allowed_packet	= 200M/' /etc/mysql/mysql.conf.d/mysqld.cnf
sudo /etc/init.d/mysql start
sudo service apache2 restart
./initialise.sh
