  #!/bin/bash    
  #this script installs energyplus at the root of a site on a linux server
  #here are the instructions for reference https://energyplus.net/installation-linux     
  echo downloading the energyplus installer
  edir=eplus
  mkdir $edir
  curl -Loi eplusinstall.sh "https://github.com/NREL/EnergyPlus/releases/download/v8.5.0/EnergyPlus-8.5.0-c87e61b44b-Linux-x86_64.sh" > ./$edir/eplus.sh
  wait
  chmod +x ./$edir/eplus.sh
  wait
  echo when promted enter your password use default as the instllation and reference directories
  sudo ./$edir/eplus.sh
  wait
  echo this worked like a charm 
  sudo rm -rf ./$edir
