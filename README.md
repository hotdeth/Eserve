  ![Eserve.png](/fatima/logorr.png "Eserve.png")


# Eserve Project – Simplifying Network Server Management

## Introduction
Initially, our networking course project focused on building a **small data center** that included servers for services such as:
- **HTTP**
- **DNS**
- **FTP**
- **DHCP**

The installation process for these servers was complex, requiring significant time and effort to achieve a fully functional and error-free setup.

After successfully completing the first project, we aimed to **simplify** this process with a new project, allowing users to install and configure all services **with a single click**.

## Project Overview
We started working on the new project, which we named **Eserve**—short for **Easy Serve**. Its primary objectives are:
- Simplifying server installation and configuration.
- Providing **installation files** and **configuration files** for all mentioned services.
- Offering a **graphical web interface** that allows users to manage services easily without dealing with complex configuration files.
- Implementing an **error detection system**, enabling users to identify and troubleshoot issues when running a server service.
- Establishing **a connection between the web interface and the background servers** running on the local machine.

## Project Features
- **Open-source project** (Eserve is fully open source).
- Compatible with the following operating systems:
  - **Ubuntu Server**
  - **Fedora Server**
  - **Arch-based distributions** (currently under development).
- Includes an **install.sh** script, which:
  - Detects **the operating system** in use.
  - Installs **all required dependencies** for running the servers.
  - **Automatically starts services** after installation.
  - Configures **all necessary system files**.
  - Launches **a web interface** that enables users to monitor and manage servers efficiently.

## Project Requirements
The system must run **Ubuntu Server or Fedora Server only**.

## Technologies Used
The project is built using the following technologies:
- **PHP** (for developing the web interface and managing services).
- **Python** (for backend operations and connecting the interface to the servers).
- **Bash Scripting** (for automating the installation and startup process).

## Project Contributors
The project was developed by a dedicated team of programmers and designers:
- **Ridha Read**
- **Ali Haider**
- **Rawan Wajdi**
- **Fatima Mohsin**
- **Ridha Karem**
- **Ali Majid**
- **Ashtar Faris**
- **Hussein Jabbar**
- **Taher Ahmed**
- **Mohammed Basem**

## Installation
To install and run Eserve, follow these steps:

1. Clone the repository:
   ```bash
   git clone https://github.com/hotdeth/Eserve.git
   cd eserve
   ```
2. Run the installation script:
   ```bash
   chmod +x install.sh
   ./install.sh
   ```
3. Once installation is complete, open your browser and go to:
   ```
   http://localhost:8000
   ```
   to access the **Eserve web interface**.

## Contribution
Contributions to this project are welcome. To contribute:
1. Fork the repository.
2. Create a new branch for your feature or bug fix.
3. Commit your changes and push them to your branch.
4. Open a pull request with a detailed description of your changes.

## License
Eserve is an **open-source project** licensed under the [MIT License](LICENSE).

