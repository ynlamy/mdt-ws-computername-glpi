# mdt-ws-computername-glpi

From Microsoft Deployment Toolkit's Windows Deployment Wizard, get the computer name from its serial number using a web service installed on a GLPI server.

This PHP script have been created by Yoann LAMY under the terms of the [GNU General Public License v3](http://www.gnu.org/licenses/gpl.html).

![Preview](mdt-ws-computername-glpi.png)

### Installation

In Microsoft Deployment, edit the file *<DeployRoot>\Control\CustomSettings.ini* to define the web service by specifying its URL (in this example : http://glpi.domain.com/) :
  
```
[Settings]
Priority=GetComputerName,Default

[GetComputerName]
WebService=http://glpi.domain.com/ws_computername.php
Parameters=SerialNumber
Method=GET
OSDComputerName=name
```

Copy the PHP script *ws_computername.php* on the GLPI server (in this example : http://glpi.domain.com/).
