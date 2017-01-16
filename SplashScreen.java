package com.example.admin.bellezatimes;

/**
 * Created by ADMIN on 08-01-2017.
 */

import android.support.v7.app.AppCompatActivity;
import android.content.Intent;
import android.os.Bundle;
import android.content.Context;
import android.content.Intent;
import android.util.Log;
import android.widget.Toast;
import okhttp3.Call;
import okhttp3.Callback;
import okhttp3.FormBody;
import okhttp3.OkHttpClient;
import okhttp3.Request;
import okhttp3.RequestBody;
import okhttp3.Response;

import java.io.IOException;
//import com.example.admin.bellezatimes.R;

public class SplashScreen extends AppCompatActivity {
    public static final String TAG1 = "check login response:";
    private static final String BASE_URL = "http://10.0.2.2/SMS/checkLogin/";
    private OkHttpClient okHttpClient = new OkHttpClient();

    @Override
    public void onCreate(Bundle savedInstance){
        super.onCreate(savedInstance);
        setContentView(R.layout.splash_screen);

        Thread thread = new Thread(){
            public void run(){
                try{
                    sleep(3000);

                        Request request1 = new Request.Builder()
                                .url(BASE_URL)
                                .build();
                        Call call1 = okHttpClient.newCall(request1);
                        call1.enqueue(new Callback() {
                            @Override
                            public void onFailure(Call call, IOException e) {
                                runOnUiThread(new Runnable() {
                                    @Override
                                    public void run() {
                                        Toast.makeText(SplashScreen.this,"Error in checking status",Toast.LENGTH_SHORT).show();
                                    }
                                });
                            }

                            @Override
                            public void onResponse(Call call, Response response) throws IOException {
                                String response1 = response.body().toString();
                                Log.v(TAG1,response1);
                                if(response1.contains("true")){
                                    Intent intent = new Intent(SplashScreen.this,FeedPage.class);
                                    startActivity(intent);
                                }
                                else{
                                    Intent intent = new Intent(SplashScreen.this,MainActivity.class);
                                    startActivity(intent);
                                }

                            }
                        });


                }
                catch(InterruptedException e){
                    e.printStackTrace();
                }
                finally {
                    Intent intent = new Intent(SplashScreen.this,MainActivity.class);
                    startActivity(intent);
                }
            }
        };
        thread.start();
    }
    @Override
    public void onPause(){
        super.onPause();
        finish();
    }
}
