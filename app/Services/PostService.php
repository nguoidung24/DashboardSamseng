<?php

namespace App\Services;

use App\Models\Posts;

class PostService
{
    public function list()
    {
        return Posts::orderBy('post_id', 'asc')->get();
    }

    public function create($att = null, $action = null)
    {
        if ($action == 'create') {
            return Posts::create($att);
        }

        return $this->postDefatult();
    }
    public function detail($att = null, $action = null)
    {
        if ($action == 'delete') {
            return Posts::where('post_id', $att)->delete();
        }
        if ($action == 'edit') {
            $id    = $att['post_id'];
            $query = Posts::where('post_id', $id)->first();
            unset($att['post_id']);
            return $query->update($att);
        }

        return Posts::where('post_id', $att)->first();
    }


    public function postDefatult()
    {
        return ' 
                <h3 style="text-align: center;"><span style="font-size: 18pt;"><strong>Cấu h&igrave;nh Điện thoại Iphone
                            13</strong></span></h3>
                <table style="border-collapse: collapse; margin: 0 auto; width: 666px; height: 154.734px; border-width: 0px; color:#1a1a1a"
                    border="1">
                    <colgroup>
                        <col style="width: 50%;">
                        <col style="width: 50%;">
                    </colgroup>
                    <tbody>
                        <tr style="height: 20.3906px;">
                            <td style="padding:8px; height: 20.3906px; border-width: 0px;">M&agrave;n h&igrave;nh:</td>
                            <td style="padding:8px; height: 20.3906px; border-width: 0px;"><span class="comma">IPS LCD</span><span
                                    class="comma">6.56"</span><span class="">HD+</span></td>
                        </tr>
                        <tr style="height: 22.3906px;">
                            <td style="padding:8px; height: 22.3906px; background-color: rgb(206, 212, 217); border-width: 0px;">Hệ điều
                                h&agrave;nh:</td>
                            <td style="padding:8px; height: 22.3906px; background-color: rgb(206, 212, 217); border-width: 0px;">Android 13
                                (Go Edition)</td>
                        </tr>
                        <tr style="height: 22.3906px;">
                            <td style="padding:8px; height: 22.3906px; border-width: 0px;">Camera trước:</td>
                            <td style="padding:8px; height: 22.3906px; border-width: 0px;">8 MP</td>
                        </tr>
                        <tr style="height: 22.3906px; background-color: rgb(206, 212, 217);">
                            <td style="padding:8px; height: 22.3906px; border-width: 0px;">Chip:</td>
                            <td style="padding:8px; height: 22.3906px; border-width: 0px;">Unisoc T606</td>
                        </tr>
                        <tr style="height: 22.3906px;">
                            <td style="padding:8px; height: 22.3906px; border-width: 0px;">RAM:</td>
                            <td style="padding:8px; height: 22.3906px; border-width: 0px;">3 GB</td>
                        </tr>
                        <tr style="background-color: rgb(206, 212, 217); height: 22.3906px;">
                            <td style="padding:8px; border-width: 0px; height: 22.3906px;">Dung lượng lưu trữ:</td>
                            <td style="padding:8px; border-width: 0px; height: 22.3906px;">64 GB</td>
                        </tr>
                        <tr style="height: 22.3906px;">
                            <td style="padding:8px; border-width: 0px; height: 22.3906px;">Pin, Sạc:</td>
                            <td style="padding:8px; border-width: 0px; height: 22.3906px;"><span class="comma">5000 mAh</span><span
                                    class="">10 W</span></td>
                        </tr>
                    </tbody>
                </table>';
    }
}
