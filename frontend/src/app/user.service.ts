import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class UserService {

  constructor(private http: HttpClient){}

  login(loginParams): Observable<any>{
    return this.http.post('http://192.168.1.212:8080/api/login_check', loginParams);
  }

  register(registerParams): Observable<any>{
    return this.http.post('http://192.168.1.212:8080/api/register', registerParams);
  }

}
