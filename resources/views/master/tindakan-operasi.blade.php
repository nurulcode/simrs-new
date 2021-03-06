@extends('layouts.single-card')

@section('title', 'Master Daftar Tindakan Operasi Management')

@section('card')
    <data-table v-bind.sync="resource" ref="table" >
        <div slot="form">
            <b-form-group v-bind="resource.form.feedback('kode')">
                <b slot="label">Kode:</b>
                <input
                    class="form-control"
                    name="kode"
                    placeholder="Kode"
                    type="text"
                    v-model="resource.form.kode"
                    >
                </input>
            </b-form-group>
            <b-form-group v-bind="resource.form.feedback('uraian')">
                <b slot="label">Uraian:</b>
                <input
                    class="form-control"
                    name="uraian"
                    placeholder="Uraian"
                    type="text"
                    v-model="resource.form.uraian"
                    >
                </input>
            </b-form-group>
            <b-form-group label="Jenis Operasi:" v-bind="resource.form.feedback('jenis')">
                <b-form-select
                    :options="{{ json_encode(App\Enums\JenisOperasi::toSelectOptions()) }}"
                    v-on:change="resource.errors.clear('jenis')"
                    v-model="resource.form.jenis">
                    <template slot="first">
                        <option :value="null" disabled>Pilih Jenis Operasi</option>
                    </template>
                </b-form-select>
            </b-form-group>
            <b-form-group label="Kelompok Operasi:" v-bind="resource.form.feedback('parent_id')">
                <ajax-select
                    :url="resource.url"
                    :params="{parent:true}"
                    label="uraian"
                    placeholder="Pilih Kelompok Operasi"
                    v-model="resource.form.parent"
                    v-bind:key-value.sync="resource.form.parent_id"
                    v-on:change="resource.form.errors.clear('parent_id')"
                    >
                </ajax-select>
            </b-form-group>
        </div>
        <template slot="uraian" slot-scope="{item, value}">
            @{{ value }}
            <p class="text-muted" v-if="item.parent">@{{ item.parent.uraian }}</p>
        </template>
    </data-table>
@endsection

@push('javascripts')
<script>
window.pagemix.push({
    data() {
        return {
            resource: {
                url   : `{{ action('Master\TindakanOperasiController@index') }}`,
                sortBy: 'kode',
                fields: [{
                    key      : 'kode',
                    sortable : true,
                },{
                    key      : 'uraian',
                    sortable : true,
                }],
                form: new Form({
                    kode     : null,
                    uraian   : null,
                    parent_id: null,
                    jenis    : null
                }, {
                    parent   : null
                }),
            }
        }
    },
});
</script>
@endpush
