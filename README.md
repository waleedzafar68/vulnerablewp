# Vulnerable Wordpress Docker - Created at VTF by Waleed Zafar
## Usage
  1. Clone git repository: 
  ```
   git clone https://github.com/waleedzafar68/vulnerablewp/
  ```
  2. Navigate to the cloned foder
  ```
  cd vulnerablewp
  ```
  3. Run the install.sh file:
  ```
  ./install.sh
  ```
  **Note:** Permission issue:
  Run the following if you encounter permissions issue
  ```
  chmod +x install.sh
  ```
  4. Navigate to localhost:
  ```
  http://127.0.0.1
  ```
  5. Install Wordpress after choosing language
  
      ![Installing Wordpress](https://user-images.githubusercontent.com/91959220/184724353-14c2a072-b232-4f16-9eee-68ab3ba26e58.png)
  
  6. Set the site title, Username, password and email
  
      ![Configuring Wordpress](https://user-images.githubusercontent.com/91959220/184724838-325eba7a-e92f-4148-a70d-4103e4ad5831.png)
      
  7. Navigate to plugins at http://localhost/wp-admin/plugins.php. Login if need be.
  8. Scroll down and activate any plugin except Hello Dolly and Akismet. Example attached
  
      ![Upl3](https://user-images.githubusercontent.com/91959220/184749301-4b6b2893-1586-437f-934e-bbeb510324bc.PNG)
      
  9. See it is activated. 
      
      ![Upl4](https://user-images.githubusercontent.com/91959220/184749419-fcfb607f-be7a-4358-b86d-da6ca6272484.PNG)
  
  10. Repeat the process for the next three plugins.
  11. All activated.
  
      ![](https://lh5.googleusercontent.com/vdjpHBlHY14K2JW1oNxAsAZptDrxldlhfLWsQsr08qq9rl9KOsrfxxhYvHCXJtj9v9yTE0wmO311OzpGY73_BjluVg5qsH_URoH4JKf7ImLxy6XjUD-9B_KUrIius7scVg0Lcbf72MshKunBYXRLhxc)
      
 ## Vulnerable Plugins:
 ### Mail Masta v1.0 (CVE-2017-6095-6098, CVE-2017-6570-6570)
 ### Duplicator v1.2.32 (CVE-2018-7543, CVE-2018-17207, CVE-2020-11738)
 ### ReFlex Gallery v3.1.7 (CVE-2015-4133) 
 ### WP Google Maps v3.4 (CVE-2019-10692)
 
