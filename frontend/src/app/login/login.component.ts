import { Component, OnInit } from '@angular/core';
import {MessageService, PhpData} from '../message/message.service';
import { Router } from '@angular/router';


@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.scss']
})
export class LoginComponent implements OnInit {
  username: string;
  password: string;
  errorMessage: string;


  constructor(private message: MessageService, private router : Router) {
    this.username = '';
    this.password = '';
    this.errorMessage = '';
  }

  ngOnInit(): void {
  }

  authenticate(): void {
    if (this.username.trim() == '' || this.password.trim() == ''){
      this.errorMessage = 'Champ(s) vide(s)';
    } else {
      this.errorMessage = '';
      console.log('Username: ' + this.username + ' Password: ' + this.password);
    }
    const event={
      username: this.username,
      password: this.password
    };

    this.message.sendMessage('checkLogin', event).subscribe((res )=>{
      this.finalizeAuthentication(res);
      this.finalizeCheck();
    });


  }

  finalizeCheck() :void {
    if(this.message.isLoggedIn){
      this.errorMessage = "";
      if(this.message.redirectUrl == ''){
        this.router.navigateByUrl("/cours");
      }
      else{
        this.router.navigateByUrl(this.message.redirectUrl);
      }
    }
    else{
      this.errorMessage = "Mauvaise Combinaison";
    }
  }

  finalizeAuthentication(reponse: PhpData){

    if (reponse.status == 'ok' ){
      this.message.isLoggedIn = true;
    }
    else{
      this.message.isLoggedIn = false;
    }
  
  }


}
