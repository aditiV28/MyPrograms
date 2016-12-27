package com.example.admin.bellezatimes;
import com.example.admin.bellezatimes.ServerRequest;
import com.example.admin.bellezatimes.ServerResponse;

import retrofit2.Call;
import retrofit2.http.Body;
import retrofit2.http.POST;
/**
 * Created by ADMIN on 23-12-2016.
 */

public interface RequestInterface {
    @POST("SMS/")

    Call<ServerResponse> operation(@Body ServerRequest request);

}
