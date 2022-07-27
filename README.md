# vulnerablewp
Vulnerable Wordpress on Ubuntu Server OVF
Setting up Ubuntu Server
Downloading Ubuntu and Creating VM
Download Ubuntu Server from: https://ubuntu.com/download/server








Create a New Virtual Machine in VMware
   ش
Add the installer disk downloaded on the next dialog

Follow the defaults
Your specifications should be similar to this

Your virtual machine will b launched after that






Vulnerable Wordpress Application Setup


## Context

A little context before we start. This Damn Vulnerable WordPress Application will be part of a larger lab topology which will be used by the current and hopefully future red teams interning with Virtually Testing Foundation. This DVWP will be of the DMZ subnet of the topology and will be exposed to the outer networks and will act as a first point of contact with the attacker per se.


## Setting up Ubuntu Server


### _Downloading Ubuntu and Creating VM_

- Download Ubuntu Server from: <https://ubuntu.com/download/server>

![](https://lh6.googleusercontent.com/fQcW4bazFc2FaIOeOYuUvEnWrxx4UVlna_iiyZd2foKz7VaFk69q-Q_mPQkkVSii5Ga5Rz3-MxkEKR_50pVbs9sBnwEUT2AjOyazYO1wu0Mb6D79ioAoT9VZek6Op9ozuHkr8gdDRJqTpkdk_2o)

  
  
  
  
  
  


- Create a New Virtual Machine in VMware

  ![](https://lh6.googleusercontent.com/_mfGtplA1faW7THX-GOjBVr0--r3id2MAW_akNg4fRTP7NAnDK89p1Y0taYPWg9moHqsgMGo1dBTS-sebHqksmiMhSnru1MK87yCD_f5H14hYK9bC7bn-w4yalayxzb-e2UmTy9REddivLsQ2ac)

- Add the installer disk downloaded on the next dialog

![](https://lh4.googleusercontent.com/H2fPrqB6Z1BAcx_MnnnfLT6uDrIlD7gvKr3k-lqP2NQunBEbxVutufukijNbMjHxR68pfwMO3QMheXFjglXwCupEbVawr-7Zcf-P_KIyLpoa0IA7VPJmy_3K2jdkOz3y0WpWcNEiU9saLHuMtGE)

- Follow the defaults
- Your specifications should be similar to this

![](https://lh3.googleusercontent.com/xZIxwN_9BYL5B0Z6Wlpxejq2mlrj1abbV6tBFRtOMWb3o7GPx3N6wkI_jf7gg4npySejNaqTalDsSpmzggBZh-UjRN_xr5d-Hu_-gAjr__mgMq5iSjRyp35Ihg3q0X8qDj_zj-Ow7uiSC1SyCPs)

- Your virtual machine will be launched after that

![](https://lh3.googleusercontent.com/2p3kUQJpNYmaaBezSqJ5OX_x3EqEmzCZtU0tEk0vu3CljQsxcB5c-jIvFG6tLn1mzvZu60XA8qftMFqDsqiNHkUwQZz1FvIqY8k6mp0BmpyfUe5kajkmtsnqYYj7lXiurebew3WcZD9XncNuGTQ)




### _Installing Ubuntu Server_

- Select Language - Default:English

![](https://lh6.googleusercontent.com/VSKewbHSzpXTfz3GpFS7cywhExoEWLWqMR82aRMzhGQdm8VLvwr7mH0UMd3H6bDjfaMxcgRsvZ19TmfZlG3NEA9ec_kDn_ZZLgXABAX-X9tyDP4-lq_yPDhnOdHdf1GrwkaYDLvMH2coRvL2tPI)

- Select whether you want to update the current distribution - Default:  Continue without updating - Recommended: Update with new installer    ![](https://lh5.googleusercontent.com/k6F41nBfRnM55lNbcQvetgqm8zlG5j0RinnOfc_Pv37y9V2O_Yxk5Je7J0vGUvrRkHv_s6h-f253ABxw4Yc_dzXh7C8AdcsEibD9ogcfxT2eA7_0yoMFy9eOQwEDwldiHLknDnaUWrm54rHWeT4)
- Select Keyboard Layout

![](https://lh6.googleusercontent.com/renr6rbW-GGzcJPZx7Ti74yURqYQpU6grkfsZYdpLrGlFb4pw_Bk8Tv_5XJ85dYc1papTnuLPelT-GzpOQ5peI9ePvjA35SV0qfqIxw_a3uf2EX_X1g7rD34qJPP8UCLfYJ9mP55L6S6Uut2zMM)

- Select install type - Recommended: Ubuntu Server

![](https://lh5.googleusercontent.com/jdETeDV94u0vWlGPyfGe7hSnwPMiYmThQDbn9CnH9krdiug7lv0kiiYN6RUGAyR77urmK_liB3OQIYZODfg0h2dHJG1opxufnVXhyhq8pNBItkmZHc6YO8wn_PTg-4mbYmHYPbL56P9wW5BXBUw)

- Configure network interface

![](https://lh4.googleusercontent.com/8u2EtJpxrymXar7cuekg2rDLzXVE7WjwLW2EWc2fMSLAdzbcvUX2CBNxpLb9mikNNTBy6iF3ujavVLeiSFQ9SYvCQAXNKvZZp9tSXWWa0cbwFsj7RqRgu0djPf2OvCUqMEupCugvu6iHW4LXE7c)

- Configure Proxy if needed

![](https://lh6.googleusercontent.com/byQdm9aj3_Qnl4v6H3Js1E4NcIANGlRViTtXyCKPRi20c3G7I6onpwhWVMuHIW_PsdNMwWMPfwailxRcUcYp3WiTHiXeo9NCHq7xXDAtvXGrmU5kgniyQxoQ_Fpslr3wcVA8-Bz75J26RBaYIq8)

- Configure mirror address    ![](https://lh4.googleusercontent.com/lOeZ7wOQ1ESyvLGIIG8yhyNPSgrUBwjvMFwBzU1TNPf9yHaf6Ei75NBRT4lnutW7bDhICxkbnQFl_tNTRJGCl5kZt6-VARPAEb211UC2ESxywl_XcHEwh7v_cO9D_t7KUI9AqVnInrHV-BFV7uc)
- Configure storage - Recommended: Use entire disk

![](https://lh3.googleusercontent.com/XQDyAF3CCU3nhDUaxnLVtHxJb4xAms8cGOTzcvXokwnrP0_JNU4vgXwaxb2p2ulZQWsrxgTkaMUopj4XM8H8o7fEx55n5OfC254ora7BLwi4FRVN_CUoiG0zcdrlq80jYHW4l3uCibsStXKc9TE)

  
  


- Select done after reviewing filesystem settings

![](https://lh3.googleusercontent.com/Zzce22SPVP6THb7FKgYpEiswuufPck44faeFku04Byl1GjRR1WG43Gy-mTF18ek32PVXTrbfNy29wTdEP1YEX0U3zYm9joS1fZDFHaF_83T-J_ZuDjrImxf0dFre30LIOBCcfy6N213nvktMjOc)

- Confirm formatting

![](https://lh4.googleusercontent.com/Gg4bS8-nRy8oxKBpyvgYnRJRsnTT5t_YHRrQodaF8bJrOlNGoBWOHDZ6zv7UjtKY5zLlWR1wKb1WBeab6Ys6b5k3C1kSbK561LEf1Hxg-oOGaWL0YRrPA3v3CHQ7Trx20WzT1mkS7aGEtNR_CF0)

  
  


- Set a name, server’s name, username and password

![](https://lh5.googleusercontent.com/Nyin843RzWBYUz8-AFda_ObkTf_LC5CgsZ6apIXx8YAivLgXB-w0_of1iWM5GN_cLw-6TeDgTKEm8S8mvm4nGl54Uo27-uGfBBjtPVYpO4dumXF1NFCuDC76bw-1PlRMoAN3qxKjETj8QapQ1tY)

- Check whether to install OpenSSH - Recommended: Install OpenSSh

![](https://lh5.googleusercontent.com/HtHhYRSCbFalK-VpeTLs-SOzG3zt06C9-RSFjtyqixxmMfc4l1_w74dcofpoW9M41vbFeTeg_VEqsXtJZtgBnpbUgEmyilPBfHQ1IT4j2AWM-ORjasMsUPb8CIzyWWez6yMMxDTAvLJwQgD8wWs)

- Select if you need any popular snap - Because we are setting up our server do not select any option

![](https://lh6.googleusercontent.com/q3LFlfKHy7HZZ6UCa-loypbspbtM1M7KXyx_DblumF8J7vHxAanWA43liexxPJ3XJ8icDGRd0M_sINha19l4uYWAFoItg9BJEPTgY_hXJpTeZow-r92BkQ0iVbZp_0FOR_7dRH3vFONZPc3oITw)

- Let Ubuntu Server Install    ![](https://lh6.googleusercontent.com/aeE6z3ZprFOu6OJq3hXK9fwXvcDtG7d8LafNvUcY3qsOLULLsaDy3NThScCtnD6_mNcM9K4dqFt_UKbTE4sj0w6eB2XjofOFYVNefr7s09fyL3p_Vjasj6od9J05qrbI1yWqdXLyxb2vCESMZDs)
- Reboot the system

![](https://lh4.googleusercontent.com/k6zvhrRc2SnySq4P5kokq4LYT6t6E42X7jkT_tCwhqCbb2EdhKGLk_rYUY83VaVXe-rkxQuDpFA8sQGcJ0tCpeOtxUwVp-IC0APTKlEESqfpynMMTk8fk3thgkP7eLXfQQTb9Q_qqbmC-zHE54w)

- Click “I Finished Installing”

![](https://lh6.googleusercontent.com/hYcDl1VA-GOF4ytgFJ5FSXwP3k7bz7-M7nPLYDmxdDXvZqz3Fkb2u11MykT8ojDwbOH6PPTgRZ35iBVtB2Imu4_LvuEauQo-4lpRPXhXPnjj3M__Zeo3UllR6Z-Zy7OWkT8H_Jk9skj6m56OccA)


### _Installing Damn Vulnerable WordPress Application_

- Login to the Ubuntu Machine

![](https://lh3.googleusercontent.com/1wUckdDwuHP4y2wOtt9wy2EXKF5mLo0wjevjQmDJ8PhtjF_uF170GGOVgAs-hlDEmOOa7jjVF8Z_dM7BnC6dI8lHvrue8KqRWQptB1zzbgx9E8TtL6KvykLo_6Hj8CXXA6v9nhnYb5egWDoKnBg)

- You now have access to the shell

![](https://lh4.googleusercontent.com/8Cx9Y_xJ1Y4yUZFvJPfAlMwiaxLsefF5xdPmSsnPclDVTlHgCtV-yfxWZoClYCh0EsSo-hA1CQvE8_BO_LnS9Wk-hcOQ2ONceNZNNSkpLz0fu9_v67L_XGJoRkXSBoL_LrcWZ68xnfO_YAoxy4c)

- Get root shell![](https://lh4.googleusercontent.com/u-zvumtsMgJFF8nslMDjk7X0D9W4--VtiSi9uuYn58R5gkT8iV7CzITFL3pQri7cIIKejVhGP6eosa2PLLXWitbczKg-3EZ9F6-iROaCsPRR-WPBBVa5Ucey5cZnMtogSGVh3_h4NlsjuFHopB4)
- Clone the Damn Vulnerable Wordpress Application github

![](https://lh6.googleusercontent.com/LGWy3iNBhOtZZx-eikIhwrwrIl3Awh5dy1y1kccIJoyl5BorJOv5Aqkdg1dpAvIFhZVq-tb2RmyN35XJUAREsiTsUuyp_K7uhGfc6eheBpqYjBWOKZ6Y-gQnbafAz6i4I0PgZMou3R1PBDy3a-8)

- Change directory to dvwp

![](https://lh6.googleusercontent.com/fIpijlc0EBv7gvBgUdkvKGgC7sprgats5j6Wpl-9xBgxlcs6wnK4VnruIYFgE-9e4Q7JEf2Wn8jK78i1sPJgxtwTcnf4sAgGa8OGgXh3xB0a73G30w-Y5H1P31Q5epXggVpqZ5Jj4yQBv97rZ5k)

- Install Docker-Compose

![](https://lh4.googleusercontent.com/DoVO5KEVhBTjxMeCqCCCBR2aZNJBr0uZ-SVRCoQWozdsN-7DUtDHnTrgySK0bOjfOhwu0Dg5zZbDy9ZgjPmf9ufDaLt4ON-qVngsmpLqU5DFMzYHwbwzFRuDzkMFEUEZgatomsWdLqvDzhWkTl0)

- Once done, Compose wp-install docker    ![](https://lh4.googleusercontent.com/318-YbWSsSIuPdTh8aEBiVjJg1SS1vjnt0wr3nlf7sVb6oUW5tmk9M_uE1Fmn-LbVFDKmByxCBbqUFiaZeVTsCeiK0hkTHvEEcP_YTO8a93VLxeOBXm7zBDPKPDrv35I0_ns_4Ae3nJXW06rj-A)


### _Install Desktop on Ubuntu Server_

- Update the source list

![](https://lh6.googleusercontent.com/ossZP5BK5YP8ebY2CPAB79i0bqKKUIahHgxcVLOPHDa2xgFU23liRxbfNkJWBsPhNJhdGWZfFxb5ui8ZtMFZIxi0yqokHqOpe0n0aoR9MMyZrHsArZVOYvoGMl-HBM7R2V1EmW26zzdG11uack8)

- Install Ubuntu Gnome Desktop

![](https://lh5.googleusercontent.com/zm7fz3b1OT5tXComAYFrp2yXpveAOXajwGB_AEMSAwLWxoRutI43570FZaf3sIBac-zeIVV-VIo6hyk3XXo3VJrEYKzVpHTFej4Zpniha62K2rkpy-tSb43aZ4tjQnFglDBAd0UTl-DozXI3XEM)

- Install lightdm display manager

![](https://lh3.googleusercontent.com/ssoPBeFjhlz-hiUJ_3AKkuLM0gFMaBq0s1ThGJQKhp1vTpYo499jbyiJ2qEMfV-nTkXiSs2FUyI-bjGNPQ0fb5bvBGcdj4HeGdDjQIfnnRwaP7BhS59JEs-zShXiAyN31xyvZeIJgflTMo90qI0)

- Select lightdm when prompted instead of gdm3

![](https://lh4.googleusercontent.com/W2DzfiKf4ibL8wVU6YvUZRqHXVLl1q0A3ppykoEFurcHZ86HX7MQo53PVAyuiHpL-DlCSa7jz3JvVMzBXEGnzeOzCm1DjrJMBpJkKRfrBYQ0QbJH9lv8Om2-8-LNTnvVW-cLN5UhYL4Pru9oiII)

- Start lightdm service

![](https://lh4.googleusercontent.com/RAKttB9S9d2sLSciktJgu-wyCmLGkHW-rZdo_p3U7JSX1uJlccADE89x7UuNk-ToqlPbL1LQxw6sbRAVkQPZR1fgV1RivLfReEMpnul1_bGcladsqmcaa8tPXd-iV7POUTKpDX84SekJ2tCsp8M)

- Voila! you have a desktop

![](https://lh6.googleusercontent.com/380nckBudsE5ApDH_q4xGG9tev1y7-c-2fFViywS74VYfVirg7vFuUUplcaCDwTL9ltxeEVaA_xLUecetZh7r47NcnBDd9Ib4wK4oHD97a_i9sw0Pd3Z0Qc8JZiSFt27Hjp0MglVOOAsUSVLbzA)’











### _Testing DVWP installation_

- Open browser like Firefox. If there is none, install using apt install firefox command.![](https://lh6.googleusercontent.com/m9iOIR4MCvpZSlW1Tu-Cv50bQUAnSaxiLec6TDV0ZxNE6l4XcxVOfKJBYlc0uoCNN8sCYhmjm9HFNsHOildcCkn1ah0EF3t9chePVihYjQvOJhhARDYSuqrFieoRkT8_Ia6IzfJWLrgIVpJwutI)
- Go to <http://127.0.0.1>
- You will be greeted with this page

![](https://lh6.googleusercontent.com/B9VOdcPZaAoCHhHaH9M_jhdy66tgoNCOBxwCOwJp6ryoqz4P7RWOuElduX-bVTNO45r32JmMXscSiY4yoefO-nZ0XQh3o_-F_En4cJvpVujFWpTW_637dagIWGZSYe-ptMLvpI2fe2OZDI_PIOg)

- Access the admin panel at http&#x3A;//127.0.0.1/wp-login.php

**![](https://lh6.googleusercontent.com/F-CnUGv-YAVGQ3eenIR8B0T1YXnlVbaevpNewcfuPoS-2VpCm6kXwoVcRm0pWqaBKdfnQc_yW1NnffTQpzt6cIyQOSuqR_JYbLE57jEPjDNK0Fjap31TF4R_qRc3WlAvYyFimfsPYzIIPAWF0Qo)**

- **Sign in using credentials admin:admin**

**![](https://lh3.googleusercontent.com/pVdI85eht7Zx1E_6zl3msWCwD06-W7PIxajfoACp0nzixQe4Niow69-Pdc_ewAfh_IptXQqYiBjI4alpoY7rkWvrrF6gdnBUnPBEks90vsP2PkjNsHmAqwTETPE5C3jtC_oSEJcKt4x3LCd-2Kg)**




### _Configuring Firewall_

- Enable IP Forwarding

![](https://lh3.googleusercontent.com/znnStCgr1flO3TP2klbSJ5TZl3M7y0kQdwV9-XYShgr7WvSX95xav_77WcCng1GkV60m3wHUn12rPsB_5snGpbtDeOOfyCP03N8LT41bv48Vyv0I07dtzo4wRyWQ8xt_EMOr9TerZcJMtZLNQV4)

- Add forwarding rule to iptables. Forward requests for port 80 to port 31337

![](https://lh3.googleusercontent.com/j_bLJOAe2eitZiqu9EB5vxHCNtBkwZIT37XB87q_rTQs0OjsTOzKHOjunMiyQHwMDskLvnrlOIxVTqYGya7hsaBB8mnaFenfgtNvcSkHXGLRu11fUA1LlGR68_oCoCEyCWAzD0PJEtAUUm5rNQE)

- Save iptables
- Test to see connectivity

This is highly error prone so we will be manually setting up wordpress on our Ubuntu Machine and we will manually setup this on our Ubuntu Server


## Manual Vulnerable Wordpress Setup on Ubuntu Server


### _Installing Wordpress Using Docker_

- Before installation, two things are expected

  -  You are using a clean import of the Ubuntu Server 22.04 with Desktop uploaded to the drive
  - You have already installed docker-compose on the VM.
  - You have already installed a web browser in the VM.

- We will use the following script: [WordPress Installation Script.txt](https://drive.google.com/file/d/1H41Sz1Y3CPjI9MqQ9g0NQR11n-2_qJpT/view?usp=sharing)

-  Make directory using mkdir

![](https://lh6.googleusercontent.com/lCOiYTNq-16u4N9yfQ4NtlTSVeaZCwFMxJoZzCG1Fd1qfh8blzN645XjhzYdPId22OTfyjbg-lyHkaaUD-6kidX0Abpg1E7Zb1Z7uUopDotxQVjzha49vn3oEvdpaHSkl5fYOgZ3Dxwir_JMKuA)

- Change directory to Wordpress


- Make a new file named docker-compose.yml using gedit   

![](https://lh5.googleusercontent.com/KncJJ16k5k1wCgyBvq52qRwPMX2xYHvq4aGMnCb2X8yynYGgCeJLz9ogtC53K5NtDQuG4EOk10TbIF9762FSi6Sqs-Ma__ZGZtM29O1uJuzon9ceTyYfKcToZBDeO4xdBu39i0QrtjTH0B670NA)

- **Paste contents of the script in this file like this**

![](https://lh5.googleusercontent.com/SF1QCHU4OdCSSvZtNfTDIaiELk2pnZMpSHz6z-9zad_9kxgPvjwugJs6si1WiJpV2PreOoxEb2MDpYVQFXHVvPoF-6QyxtuQpYWZ5XldlV4XIZtSZeKfLQ3-KGBHN4g7GDcSNHg96WxmnzkezSA)

- Now in our experience, we encountered an upload size problem, this will be fixed by creating a upload.ini file in wordpress directory

![](https://lh6.googleusercontent.com/GJ1DWKWt17wLzCGsHvrj3n2Bkndp1DgH24VEz78tw4dXzhTe9_92fmfXfKpHX0tU4d84x3W1oUV0f4Ksrfj2M0JC8NVrCC1hbRMFqNR3Qu6YrAcj4KSP_vLvmOyYGb-sPrEd2Hmrc_eiEVMDxgY)

- The file will contain the following lines

![](https://lh6.googleusercontent.com/4k6Uh9GUNLeQEWuIEEqAJKBqzHpbHbStpNcFJYWQIYYmeYMC5Hy-VunuoBpcrtqYwtRtN00PibKXTpZvefjseXx5uxg1bxGMt-RhqU4Aw1C3sCNbZ9oPZiywGPc4NQ1FSSgfHBEWOP3H5yUv7BA)

- Edit the docker-compose.yml file and the wordpress section as follows

![](https://lh5.googleusercontent.com/HDZNu3dQm022oXUQqsN1nHZSTgZWzDcW5T-KQ1kPRPCjkwb3gQ8MKAcMzxGT9Zc4XJbsxTtv_8xlvlw8fOh9jrP04R8AQ-2uqo0RHr1JJIHl7Hcd4KLxF2ruW7UqsaY30Dc8pA-es34aJkWkAts)

- Run docker-compose up -d

![](https://lh4.googleusercontent.com/HfYnLGYNmF4DzU7NnIZWxjjOkctGNc8Xsqoae77HMhucSWJwgP766um8Er2EbcqRyA8G01geA-l2w-ZlCIJiJeR-d2f-FX1gkJUAuCYxoV01IeoR4e0ZbwqcAHRPMhUnVqHaXoNqL8HnyU9Vy4w)

- Navigate to your machine’s IP address in a browser and you will greeted by a similar screen

![](https://lh4.googleusercontent.com/_wNaFhqZrA-Vz5T-REiIK-PQu4jEFEARsDfuI47P3bAEzR6Hb72fJOSFkzVm64SBMF60t5SU3L3VNaPajn9PLxDT845LrFyU5HQ6Ip713K0-H8SI5kxK_6Ox9KCS_oHma8yUoMPeGx-ENb0yZK0)

- Select Language. Recommended: English
- Configure the site in the next step

![](https://lh3.googleusercontent.com/CLkMXdOARU5Ot3tqljjMvFSiZIf7ZF9CdGKfUq9pGw1sorUkEXVbzBmQ0EUJ-ONImPWEgAPyBtN-NKDBKQ1ixwwkBEd39B4hsOJN0t7iJeAmyDWzvT95B5jtItbm8Y8HkpLrcijVIBz1069VoRY)

- Click Install and if all goes well you will be greeted by a success message

![](https://lh6.googleusercontent.com/B7KAGptDy9HW10sRa_ysLlJBLyNi1OxSlDQnjoVhYwExGsbO30nv2kkdFJbeIO3dfOeUqSjsLeM8PREd9r0BwA9_kB2cnLstpdG1fGBN7oMk1UzM_qg02XYqwQ7aDsI5jzjLpLFWnbqxaRhi6U8)

- Check whether your site is accessible from another device on the network. I will be using my Kali machine for this. We can access the website

![](https://lh3.googleusercontent.com/lv93y52hlF5YKf90BKFSoBb5wa7MSdevnKMW4reDHvSYzIHALD0a0rtEGn935jE9AarQCheUaCKHPxEMCGX4e8kgk3m3L2OgCGraWLvzidiEeltpPmNjpVvEAUHAElUnqBIdJuhzBz6tXKwIAJk)

- Test to see if the site is still up on restart of Ubuntu Server. We have access and we are good to go.

![](https://lh6.googleusercontent.com/lFlrTsXkZwHqnlBCesIMMgOBo6FPU7ih82-NV6jQeLxpmjNCNTcC1avGjXoqsZXdm5F93kbVVCtaLhOxe2OXpHn_vLqvyyg4YQIdMPILKzig5xp3N0o6kiyQcitV9V6FfJvQBKlPezJMvEEbHSE)











### _Installing Vulnerable plugins on the Wordpress site_

- We will initially add 4 vulnerable plugins to the WordPress Site:

  - Duplicator v1.2.32
  - Mail Masta v1.0
  - ReFlex Gallery v3.1.7
  - WP Google Maps v3.4

  
  


- Navigate to plugins at site/wp-admin and click Add New

![](https://lh4.googleusercontent.com/5DP7U6p-1szBMnjyqYxTwqM-8ZgXwGiTRxMH8LcYat3B8ahqaJVB0TZDCto2LM4SnvNfBcXkwq35H_dhdFDAmECx6mWIDI3KQtgR-jN9KIEQzA2Ki2bf_U480_EyvTde1a0ho0PC35T2aIznd4o)

- Download the plugins neatly compiled from here: [WP Plugins.7z](https://drive.google.com/file/d/1nHKISqY43tHQ4knPuicQMr4FcEckNQdn/view?usp=sharing)
- Install p7zip package to extract the 7z package

![](https://lh4.googleusercontent.com/N2__KER5pEp9Br0aMHuBGyKgNw4B1e2DGdA8Uun9swgzaAzKpIkH8j25urYvo6zwwBlkGVBgur_agPINZVcu_FIW7rDKrH3_zKIR4tZF_CKcX1yK1YawXgvurQRGsqFzy6xk-47bv593gG-bCFc)

- Change directory to Downloads

![](https://lh3.googleusercontent.com/3Bj1ceZ-QUY3uwuaUPqypexwuW4cWnCmYWVPZntpkjzR7VuUJk2lb4tM4EOJJZ8QHWD4DjhtcKsfqO7i80FsD0Sxarr-8Ttyw0Uucc0yDJG29oRVedbWtlfWeromsR5VYy7zzRbeds2jpfORWQ0)

- Extract the archive using 7z x WP\\ Plugins.7z

![](https://lh4.googleusercontent.com/k12Gs9qo6rB0Vtf_vGSXyQM8VSicvlE3C7aVX-lv5ZBlfmUcHwfGWnFBgO3kzpzybE2_yubRIpjhUq3MIqMYfVQIcMQYq1hXEDujNdy0kEvrcc3bg57jHzuAX9gmyA8KFltKqj-xMEB-DTyT9b0)

- Select Upload Plugin on your WP site and then click Browse

![](https://lh6.googleusercontent.com/kxYIKHWkME7x9qv6qHMFOMuSTRqhpi2yzDIxWJoGvMjqoD_kb7n40RAJAaa5qeeM2FMpzNtuZS9h3QOM0IaKWiDg7jXs_-_61IhrBLXPJj0Ji8shCiKKhGziehSqznlDw8FGRjMa8ZFPuTSzd_c)

- Upload any of the 4 zips in any order. An example is attached

![](https://lh6.googleusercontent.com/-GxMI2ha7oIB5jTgi-G0gB2ZaPw8D9zhfTO_vq9eWvEc8SMtQA35iao3e-MebEHlNh_vL_2yJwAZDj4aHgge2_bhVPtQcfu6_c8H3UHoDvj9cayTerY9sn90rtNTApL0G9nwvKWHWdz_eYZ9L_k)

- Click Install Now to Install

![](https://lh3.googleusercontent.com/nPCJ7ymcO3ZJ7WLurCwCl8h2XY7enefAq4SFOiiYweL7hZxu5EKMZHGvrwRRScJVtMnIwgDeKIuSIhC_sjY2GAb_X-4xGJKHFKo6WT84TIYY3QnzSd7ai5pXWHRpK4dVSbqFs-Y2cMGCgNzbDMs)

- Click Activate Plugin

![](https://lh3.googleusercontent.com/P9QquVvgpiQMGoJk6flDUN9o7Roj0v3xDL4SpxL5GbAYoWqnnQ1GPtWntUjArfA-2Cjjwc2qFbX11s8laBTqCxRx5WTXOV7yT16_fPpDro0VCoGk3pj9pqOmX2hLZEuCWiGSkvqJL0mAzq2SQDc)

- See it is activated

![](https://lh3.googleusercontent.com/xcY_xy9nRxgCIrrshh9rE9GhH1bcoRMRzNjwuTqy5bab54xDZqQK7EwuFUnA5Nb0Q5RqEtC0uxfUy0oEC-gt4vajpQD2M-L7UsFzlYIIqV2NkD6nWpZmnMm7WLQwI7FMS2MRV5BIR5qvmdH3gA0)

- Repeat the process for the next three plugins. If there is an error in activation, try manually activating from the plugin page.
- All four of them are now installed

![](https://lh5.googleusercontent.com/wikwsLN9QuIPiEK-NaPOoGtbxLTR-2ergPISHi0jRRchocOrFyhpygJ3bd0ogU5NgCOVAoo7h4b6DtNHil1XVwK4ajkwYJFZINxkBx54C_gTLPHvI3mQX4kPKkAUfFUfobr5Rv747AL-6rAlyZQ)

![](https://lh4.googleusercontent.com/nOGtfWQacD813uGh1hWXo1SoO_V2uVtFues2h7VahEcTcAF8FWZzEzedHHQO2fitjnC6sZ6bJmT0uPcsXMBzGukw5fI8RJ0DaEVsCXxswULYWH9TPFreFcvypQ2FaSQ0tNfT-TpBfdzefz4GuLU)
