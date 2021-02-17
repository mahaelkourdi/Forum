import { Injectable } from '@angular/core';
import {HttpClient} from '@angular/common/http';
import {environment } from 'src/environments/environment';
import { Observable } from 'rxjs';


// Spécifier l'interface PHP data

export interface PhpData{
  status: string;
  data: any;
}

@Injectable({
  providedIn: 'root'
})
export class MessageService {
  isLoggedIn: boolean = false;
  redirectUrl: string = '';

  constructor(private http: HttpClient) { }

  sendMessage(url: string, data?: any): Observable<PhpData>{

    const adr = environment.url + url + '.php';
    console.log(adr);
    const formData = new FormData();

    if (data != null){
      for (const key of Object.keys(data)){
        formData.append(key, data[key]);
      }
    }

    console.log(formData);

    return this.http.post<PhpData>(adr, formData, { withCredentials: true });

  }





}


