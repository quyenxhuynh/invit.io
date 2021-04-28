import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import{ Observable } from 'rxjs';
import { Report } from './report';

@Injectable({
  providedIn: 'root'
})
export class ReportService {

  constructor(private http: HttpClient) { }

  sendRequest(data: any): Observable<any> {
    return this.http.post('http://localhost/test/ngphp-post.php', data);
  }

  sendReport(data: any): Observable<Report> {
    return this.sendRequest(data);
  }
}
